<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentRegistration;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class StudentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = StudentYear::all();
        $classes = StudentClass::all();

        // search by year/class
        $year_id = StudentYear::orderBy('id', 'DESC')->first()->id; //5
        $class_id = StudentClass::orderBy('id', 'DESC')->first()->id; //8
        $model = StudentRegistration::where('year_id', $year_id)->where('class_id', $class_id)->get();

        return view('Backend.Student.Student_registration.index', compact('model', 'years', 'classes', 'year_id', 'class_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years = StudentYear::all();
        $classes = StudentClass::all();
        $groups = StudentGroup::all();
        $shifts = StudentShift::all();
        return view('Backend.Student.Student_registration.create', compact('years', 'classes', 'groups', 'shifts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        DB::transaction(function () use ($request) {

            $checkYear = StudentYear::find($request->year_id)->name;

            $student = User::where('user_type', 'Student')->orderBy('id', 'DESC')->first();

            // Check if student exists
            if (!isset($student)) {
                $firstReg = 0;
                $studentId =  $firstReg + 1;
                if ($studentId  < 10) {
                    $id_no = '000' . $studentId;
                } else if ($studentId  < 100) {
                    $id_no = '00' . $studentId;
                } else if ($studentId  < 1000) {
                    $id_no = '0' . $studentId;
                }
            } else {
                $student = User::where('user_type', 'Student')->orderBy('id', 'DESC')->first()->id;
                $studentId =  $student + 1;
                if ($studentId  < 10) {
                    $id_no = '000' . $studentId;
                } else if ($studentId  < 100) {
                    $id_no = '00' . $studentId;
                } else if ($studentId  < 1000) {
                    $id_no = '0' . $studentId;
                }
            }

            $finalIDNo =  $checkYear . $id_no;
            $user = new User();
            $code = rand(0000, 9999);
            $user->id_no = $finalIDNo;
            $user->password = bcrypt($code);
            $user->user_type = 'Student';
            $user->code = $code;
            $user->name = $request->name;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));

            if ($request->hasfile('image')) {
                $destination = 'uploads/student_images/' . $user->image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/student_images/', $filename);
                //Save the filename in the db
                $user->image = $filename;
            }
            $user->save();

            // Save to Student Registration
            $student = new StudentRegistration();
            $student->student_id = $user->id;
            $student->class_id = $request->class_id;
            $student->year_id = $request->year_id;
            $student->group_id = $request->group_id;
            $student->shift_id = $request->shift_id;
            $student->save();

            // Save to school Discount
            $discount = new DiscountStudent();
            $discount->student_id = $student->id;
            $discount->fee_category_id = 2;
            $discount->discount = $request->discount;
            $discount->save();
        });
        $notification = array(
            'message' => 'Student registration inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student_registration.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($student_id)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();

        $data['model'] = StudentRegistration::with(['user', 'discount'])->where('student_id', $student_id)->first();

        return view('Backend.Student.Student_registration.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $student_id)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        DB::transaction(function () use ($request, $student_id) {

            $user = User::where('id', $student_id)->first();
            $user->name = $request->name;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));

            if ($request->hasfile('image')) {
                $destination = 'uploads/student_images/' . $user->image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/student_images/', $filename);
                //Save the filename in the db
                $user->image = $filename;
            }
            $user->save();

            // Save to Student Registration
            $student =  StudentRegistration::where('id', $request->id)->where('student_id', $student_id)->first();
            $student->class_id = $request->class_id;
            $student->year_id = $request->year_id;
            $student->group_id = $request->group_id;
            $student->shift_id = $request->shift_id;
            $student->save();

            // Save to school Discount
            $discount = DiscountStudent::where('student_id', $student_id)->first();
            $discount->discount = $request->discount;
            $discount->save();
        });
        $notification = array(
            'message' => 'Student registration inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student_registration.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($student_id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $years = StudentYear::all();
        $classes = StudentClass::all();

        // search by year/class
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $model = StudentRegistration::where('year_id', $year_id)->where('class_id', $class_id)->get();

        return view('Backend.Student.Student_registration.index', compact('model', 'years', 'classes', 'year_id', 'class_id'));
    }
}
