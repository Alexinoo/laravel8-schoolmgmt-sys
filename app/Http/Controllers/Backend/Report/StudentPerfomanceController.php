<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\Student_mark;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use PDF;

class StudentPerfomanceController extends Controller
{
    public function index()
    {
        $data['years'] = StudentYear::orderBy('id', 'desc')->get();
        $data['classes'] = StudentClass::orderBy('id', 'desc')->get();
        $data['exam_types'] = ExamType::all();
        
        return view('Backend.Report.Student_perfomance.index', $data);
    }


    public function GetStudentPerfomanceReport(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;

        $singleResult = Student_mark::where('year_id',$year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->first();

        if($singleResult == true){

            $data['allData'] = Student_mark::select('student_id', 'year_id', 'class_id', 'exam_type_id')->where('year_id', $year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->groupBy('year_id')->groupBy('class_id')->groupBy('exam_type_id')->groupBy('student_id')->get();
            // dd($data['allData']->toArray());

            // Load to PDF
            $pdf = PDF::loadView('Backend.Report.Student_perfomance.student_perfomance_report_pdf', $data);

            return $pdf->stream('Student Perfomance Report.pdf');


        }else{
            $notification = array(
                'message' => 'No data found for your selection criteria',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }
}
