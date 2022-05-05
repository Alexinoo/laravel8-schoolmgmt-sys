<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee_leave;
use App\Models\Leave_purpose;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['model'] = Employee_leave::orderBy('id', 'DESC')->get();

        return view('Backend.Employee.Employee_leave.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['employees'] = User::where('user_type', 'Employee')->get();

        $data['leave_purpose'] = Leave_purpose::all();

        return view('Backend.Employee.Employee_leave.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'employee_id' => 'required',
            'leave_purpose_id' => 'required',
            'applied_from' => 'required',
            'applied_to' => 'required'
        ]);

        DB::transaction(function () use ($request) {

            if ($request->leave_purpose_id == 0) {

                $leavePurpose  = new Leave_purpose;
                $leavePurpose->name = ($request->input('name') != null) ? $request->input('name') : 'Unknown';
                $leavePurpose->save();
                $leave_purpose_id = $leavePurpose->id;
            } else {
                $leave_purpose_id = $request->leave_purpose_id;
            }

            $model = new Employee_leave;
            $model->employee_id = $request->employee_id;
            $model->leave_purpose_id = $leave_purpose_id;
            $model->applied_from = date('Y-m-d', strtotime($request->applied_from));
            $model->applied_to = date('Y-m-d', strtotime($request->applied_to));
            $model->save();
        });
        $notification = array(
            'message' => 'Leave request inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('employee_leave.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
