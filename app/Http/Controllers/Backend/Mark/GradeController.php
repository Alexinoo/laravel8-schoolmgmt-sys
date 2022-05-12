<?php

namespace App\Http\Controllers\Backend\Mark;

use App\Http\Controllers\Controller;
use App\Models\Mark_grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    public function index()
    {

        $data['model'] = Mark_grade::all();

        return view('Backend.Grade.index' , $data);
       
    }
    public function create()
    {

        return view('Backend.Grade.create');
       
    }
    public function store( Request $request )
    {
        $data = $request->validate([
            'grade_name' => 'required',
            'grade_point' => 'required',
            'start_marks' => 'required',
            'end_marks' => 'required',
            'start_point' => 'required',
            'end_point' => 'required',
            'remarks' => 'required',
        ]);
        DB::transaction( function() use($request){

            $model = new Mark_grade();
            $model->grade_name = $request->grade_name;
            $model->grade_point = $request->grade_point;
            $model->start_marks = $request->start_marks;
            $model->end_marks = $request->end_marks;
            $model->start_point = $request->start_point;
            $model->end_point = $request->end_point;
            $model->remarks = $request->remarks;
            $model->save();
        } );

      $notification = array(
          'message' => 'Grade marks inserted succesfully',
          'alert-type' => 'success',
      );

        return redirect()->route('marks_grade.index')->with($notification);
       
    }

    public function edit($id)
    {
        $data['model'] = Mark_grade::where('id' , $id)->first();
        return view('Backend.Grade.edit' , $data);
    }
    public function update(Request $request ,$id)
    {
        $data = $request->validate([
            'grade_name' => 'required',
            'grade_point' => 'required',
            'start_marks' => 'required',
            'end_marks' => 'required',
            'start_point' => 'required',
            'end_point' => 'required',
            'remarks' => 'required',
        ]);
        DB::transaction(function () use ($request , $id) {

            $model = Mark_grade::where('id', $id)->first();
            $model->grade_name = $request->grade_name;
            $model->grade_point = $request->grade_point;
            $model->start_marks = $request->start_marks;
            $model->end_marks = $request->end_marks;
            $model->start_point = $request->start_point;
            $model->end_point = $request->end_point;
            $model->remarks = $request->remarks;
            $model->update();
        });

        $notification = array(
            'message' => 'Grade marks updated succesfully',
            'alert-type' => 'info',
        );

        return redirect()->route('marks_grade.index')->with($notification);
    }
}
