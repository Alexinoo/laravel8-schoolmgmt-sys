<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\Employee_attendance;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;

class AttendanceReportController extends Controller
{
    public function index(){

        $data['employees'] = User::where('user_type', 'Employee')->get();

        return view('Backend.Report.Attendance.index',$data);
    }

    public function GetAttendanceReport(Request $request){

      $employee_id = $request->employee_id;

      if($employee_id  != ''){
        $where[] = ['employee_id', $employee_id];
      }

    $date = date('Y-m', strtotime($request->date));

      if($date  != ''){
        $where[] = ['date', 'like', '%'.$date.'%'];
      }

      $singlePersonAttendance = Employee_attendance::with(['user'])->where($where)->get();

      if($singlePersonAttendance == true ){

            // Get Attendance for All days
            $data['allDays'] = Employee_attendance::with(['user'])->where($where)->get();

                // Get Absent days count
            $data['absentCount'] = Employee_attendance::with(['user'])->where($where)->where('attendance_status','Absent')->get()->count();

                // Get Days on Leave count
            $data['leaveCount'] = Employee_attendance::with(['user'])->where($where)->where('attendance_status','Leave')->get()->count();

            $data['month'] = date('M Y', strtotime($request->date));

            $pdf = PDF::loadView('Backend.Report.Attendance.attendance_report_pdf', $data);

            return $pdf->stream('Attendance Report.pdf');

      }else{

            $notification = array(
                'message' => 'No Attendance data Found for the selected Criteria',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
      }
       
    }
}
