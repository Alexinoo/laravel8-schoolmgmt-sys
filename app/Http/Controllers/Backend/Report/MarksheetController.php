<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\Mark_grade;
use App\Models\Student_mark;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class MarksheetController extends Controller
{
    public function index(){

        $data['years'] = StudentYear::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('Backend.Report.Marksheet.index',$data);
    }

    public function GetMarksheet(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;
        $id_no = $request->id_no;

        $countFail = Student_mark::where('year_id',$year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->where('marks','<', 40)->get()->count();

        $singleStudent = Student_mark::where('year_id',$year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->first();

       
        if ($singleStudent  == true){

           $allMarks = Student_mark::with(['student' , 'year'])->where('year_id', $year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->get();

           $grades = Mark_grade::all();

           return view('Backend.Report.Marksheet.marksheet_pdf',compact('allMarks', 'grades','countFail'));

            }else{

            $notification = array(
                'message' => 'No student matched your selection criteria',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
            }
        }
}
