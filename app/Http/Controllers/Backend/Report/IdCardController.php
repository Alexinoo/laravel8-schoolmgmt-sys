<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\StudentRegistration;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use PDF;

class IdCardController extends Controller
{
    public function index()
    {

        $data['years'] = StudentYear::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::orderBy('id','desc')->get();

        return view('Backend.Report.ID_Card.index', $data);
    }
    
    public function GetStudentIDCard(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;

        $checkData = StudentRegistration::where('year_id',$year_id)->where('class_id', $class_id)->first();
    
        if( isset($checkData)){

            $data['allData'] =  StudentRegistration::where('year_id',$year_id)->where('class_id', $class_id)->get();
            // dd($data['allData']->toArray());

            $pdf = PDF::loadView('Backend.Report.ID_Card.IDCard_report_pdf', $data);

            return $pdf->stream('ID Card.pdf');

        }else{
            $notification = array(
                'message' => 'No data found for your selection criteria',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }

}
