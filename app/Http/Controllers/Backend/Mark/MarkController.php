<?php

namespace App\Http\Controllers\Backend\Mark;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\Student_mark;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarkController extends Controller
{
    public function entries(){

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('Backend.Mark.entries' , $data);

    }
    public function store(Request $request){

        DB::transaction(function() use ($request ){

            $cntStudents = $request->student_id;

            if ($cntStudents) {
                for ($i = 0; $i < count($request->student_id); $i++) {

                    // Save data
                    $model = new Student_mark();
                    $model->student_id =  $request->student_id[$i];
                    $model->id_no =  $request->id_no[$i];
                    $model->year_id =  $request->year_id;
                    $model->class_id =  $request->class_id;
                    $model->subject_id =  $request->subject_id;
                    $model->exam_type_id =  $request->exam_type_id;
                    $model->marks =  $request->marks[$i];

                    $model->save();
                }
            }

        });

        $notification = array(
            'message' => 'Student Marks inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function edit()
    {

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('Backend.Mark.edit', $data);
    }

    public function update(Request $request)
    {

        DB::transaction(function () use ($request) {

            // Delete
            Student_mark::where('year_id',$request->year_id)->where('class_id', $request->class_id)->where('subject_id', $request->subject_id)->where('exam_type_id', $request->exam_type_id)->delete();

            // Then insert
            $cntStudents = $request->student_id;

            if ($cntStudents) {
                for ($i = 0; $i < count($request->student_id); $i++) {

                    // Save data
                    $model = new Student_mark;
                    $model->student_id =  $request->student_id[$i];
                    $model->id_no =  $request->id_no[$i];
                    $model->year_id =  $request->year_id;
                    $model->class_id =  $request->class_id;
                    $model->subject_id =  $request->subject_id;
                    $model->exam_type_id =  $request->exam_type_id;
                    $model->marks =  $request->marks[$i];

                    $model->save();
                }
            }
        });

        $notification = array(
            'message' => 'Student Marks updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
