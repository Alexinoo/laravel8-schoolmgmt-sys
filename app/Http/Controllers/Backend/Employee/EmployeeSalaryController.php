<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeSalaryLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employees'] = User::where('user_type', 'Employee')->get();

        return view('Backend.Employee.Employee_salary.index', $data);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function increment($employee_id)
    {
        $data['employee'] = User::where('id', $employee_id)->first();
        return view('Backend.Employee.Employee_salary.increment', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employee_id)
    {
        $data = $request->validate([
            'wef' => 'required'
        ]);

        DB::transaction(function () use ($request, $employee_id) {

            $user = User::where('id', $employee_id)->first();
            // Get current Salary

            $prevSal = $user->salary;
            $newSal = (float)$prevSal + (float)($request->salary_increment);
            $user->salary = $newSal;

            $user->save();

            // Update Salary Logs
            $salLog = new  EmployeeSalaryLog;
            $salLog->employee_id = $employee_id;
            $salLog->previous_salary = $prevSal;
            $salLog->salary_increment = $request->salary_increment;
            $salLog->current_salary = $newSal;
            $salLog->wef = date('Y-m-d', strtotime($request->wef));
            $salLog->save();
        });


        $notification = array(
            'message' => 'Salary increment updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('employee_salary.index')->with($notification);
    }

    // Render Salary history data
    public function salary_history($employee_id)
    {
        $data['user'] = User::where('id', $employee_id)->first();

        $data['salaryHist'] = EmployeeSalaryLog::where('employee_id', $data['user']->id)->get();

        return view('Backend.Employee.Employee_salary.salary_history', $data);
    }
}
