<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\StudentRegistration;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentRollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        return view('Backend.Student.Generate_roll.index', $data);
    }


    public function fetchStudents(Request $request)
    {
        $data = StudentRegistration::with(['user'])
            ->where([
                'year_id' => $request->year_id,
                'class_id' => $request->class_id
            ])
            ->get();

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->student_id != null) {
            for ($i = 0; $i < count($request->student_id); $i++) {

                StudentRegistration::where([
                    'year_id' => $request->year_id,
                    'class_id' => $request->class_id,
                    'student_id' => $request->student_id[$i]
                ])->update(['roll' => $request->roll[$i]]);
            }
        } else {
            $notification = array(
                'message' => 'No student found for update',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }

        $notification = array(
            'message' => 'Well done, Roll generated successfully..',
            'alert-type' => 'success'
        );

        return redirect()->route('generate_roll.index')->with($notification);
    }
}
