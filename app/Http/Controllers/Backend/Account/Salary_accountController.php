<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\Employee_attendance;
use App\Models\Salary_account;
use Illuminate\Http\Request;

class Salary_accountController extends Controller
{
    public function index(){

        $data['model'] = Salary_account::all();

        return view('Backend.Account.Salary_account.index',$data);
    }
    public function create(){

            return view('Backend.Account.Salary_account.create');
    }

    
    public function fetchEmpSalaries(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));

        if ($date != '') {
            $where[] = ['date', 'like', $date . '%'];
        }

        $allEmployees = Employee_attendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();

        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>Emp No</th>';
        $html['thsource'] .= '<th>Emp Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Salary This Month</th>';
        $html['thsource'] .= '<th>Select</th>';

        foreach ($allEmployees as $key => $value) {

            $salary_account = Salary_account::where('employee_id' , $value->employee_id )->where('date' , $date)->first();

            if ($salary_account != null) {
                $checked = 'checked';
            } else {
                $checked = '';
            }

            $totalAttendance = Employee_attendance::with(['user'])->where($where)->where('employee_id', $value->employee_id)->get();

            // Absent employees
            $absentCount = count($totalAttendance->where('attendance_status', 'Absent'));

            $html[$key]['tdsource']  = '<td>' . ($key + 1) . '</td>';

            $html[$key]['tdsource'] .= '<td>';
            $html[$key]['tdsource'] .= $value->user->id_no;
           $html[$key]['tdsource'] .= '<input type="hidden" name="date" value=" '.$date.' " />';
            $html[$key]['tdsource'] .= '</td>';

            $html[$key]['tdsource'] .= '<td>' . $value->user->name . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value->user->salary . '</td>';

            $salary = (float)$value->user->salary;
            $dailySalary =  (float) $salary / 30;

            $LOP =  (float) $absentCount *  (float) $dailySalary;

            $totalSalary =  (float) $salary -  (float) $LOP;

            $html[$key]['tdsource'] .= '<td>' . $totalSalary .'<input type="hidden" name="amount[]" value=" '. $totalSalary.' " readonly /> '. '</td>';

            $html[$key]['tdsource'] .= '<td>';
            $html[$key]['tdsource'] .= '<input type="hidden"  name="employee_id[]" value="'. $value->employee_id.'"/>';
            $html[$key]['tdsource'] .= '<input type="checkbox"  name="checkManage[]"  id="'. $key . '"" value="'.$key.'" '.$checked.' style="transform :scale(1.5); margin-left : 10px;" />';
            $html[$key]['tdsource'] .='<label for="'.$key.'"> </label>';
            $html[$key]['tdsource'] .= '</td>';
        }

        return response()->json(@$html);
    }



    public function store(Request $request){

        $date = date('Y-m', strtotime($request->date));

        // Delete if any
        Salary_account::where('date', $request->date)->delete();

        // Then Insert
        $checkedData = $request->checkManage;

        if ($checkedData != null) {

            for ($i = 0; $i < count($checkedData); $i++) {

                $model = new Salary_account;
                $model->date = $date;
                $model->employee_id = $request->employee_id[$checkedData[$i]];
                $model->amount = $request->amount[$checkedData[$i]];
                $model->save();
            }
        }

        if (!empty(@$model) || empty($checkedData)) {

            $notification = array(
                'message' => 'Payroll Confirmation Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('salaries.index')->with($notification);
        } else {

            $notification = array(
                'message' => 'Sorry !, Data not saved',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
       }
    }
}