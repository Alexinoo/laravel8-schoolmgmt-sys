<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee_attendance;
use App\Models\Employee_leave;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['model'] = Employee_attendance::select('date')->groupBy('date')->orderBy('id', 'DESC')->get();

        return view('Backend.Employee.Employee_attendance.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['employees'] = User::where('user_type', 'Employee')->get();

        return view('Backend.Employee.Employee_attendance.create', $data);
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
            'date' => 'required',
        ]);

        DB::transaction(function () use ($request) {

            // Delete existing
            Employee_attendance::where('date',$request->date)->delete();

            // count employees
            $empCount = count($request->employee_id);

            // loop through each employees
            for ($i = 0; $i < $empCount; $i++) {
                $attendance_status = 'attendance_status' . $i;
                // Save to db
                $model = new Employee_attendance();
                $model->date = date('Y-m-d', strtotime($request->date));
                $model->employee_id = $request->employee_id[$i];
                $model->attendance_status = $request->$attendance_status;
                $model->save();
            }
        });
        $notification = array(
            'message' => 'Employee Attendance data inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('employee_attendance.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($date)
    {
        $data['models'] = Employee_attendance::where('date', $date)->get();

        return view('Backend.Employee.Employee_attendance.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($date)
    {
        $data['models'] = Employee_attendance::where('date', $date)->get();


        $data['employees'] = User::where('user_type', 'Employee')->get();

        return view('Backend.Employee.Employee_attendance.edit', $data);
    }

}
