<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee_attendance;
use Illuminate\Http\Request;
use PDF;

class MonthlySalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('Backend.Employee.Monthly_salary.index');
    }


    // Calculate Monthly Salary for Employees
    
    public function fetchEmpMonthlySal(Request $request)
    {
        $date = date('Y-m',strtotime($request->date));

        if ($date != '') {
            $where[] = ['date', 'like', $date . '%'];
        }
       
        $allEmployees= Employee_attendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();

        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>Reg No</th>';
        $html['thsource'] .= '<th>Emp Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Salary This Month</th>';
        $html['thsource'] .= '<th>Action</th>';

        foreach ($allEmployees as $key => $value) {

            $totalAttendance = Employee_attendance::with(['user'])->where($where)->where('employee_id', $value->employee_id )->get();

            // Absent employees
            $absentCount = count($totalAttendance->where('attendance_status', 'Absent'));

            $color = 'success';
            $html[$key]['tdsource']  = '<td>' . ($key + 1) . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value->user->id_no . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value->user->name . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value->user->salary . '</td>';

            $salary = (float)$value->user->salary;
            $dailySalary =  (float) $salary /30;    

            $LOP =  (float) $absentCount *  (float) $dailySalary;        
            
            $totalSalary =  (float) $salary -  (float) $LOP;

            $html[$key]['tdsource'] .= '<td>' . $totalSalary . '$' . '</td>';

            $html[$key]['tdsource'] .= '<td>';
            $html[$key]['tdsource'] .= '<a class="btn btn-sm btn-' . $color . '" title="Monthly Salary Pay Slip" target="_blanks" href="' . route("monthly_salary_payslip" , $value->employee_id).'"><i class="fa fa-file-pdf-o"></i></a>';
            $html[$key]['tdsource'] .= '</td>';
        }

        return response()->json($html);
    }
    // End fetchEmpMonthlySal


    
    public function EmpMonthlySalPayslip(Request $request , $emp_id)
    {
       $id = Employee_attendance::where('employee_id' , $emp_id)->first();

        $date = date('Y-m', strtotime($id->date));

        if ($date != '') {
            $where[] = ['date', 'like', $date . '%'];
        }

        $data['records'] = Employee_attendance::with(['user'])->where($where)->where('employee_id' , $id->employee_id)->get();

        $pdf = PDF::loadView('Backend.Employee.Monthly_salary.monthly_salary_pdf', $data);

        return $pdf->stream('payslip.pdf');
    }

}
