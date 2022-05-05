<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\EmployeeSalaryLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PDF;

class EmployeeRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employees'] = User::where('user_type', 'Employee')->get();

        return view('Backend.Employee.Employee_registration.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['designations'] = Designation::all();
        return view('Backend.Employee.Employee_registration.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            $checkYear = date('Ym', strtotime(($request->join_date)));

            $employee = User::where('user_type', 'Employee')->orderBy('id', 'DESC')->first();

            // Check if student exists
            if ($employee == null) {
                $firstReg = 0;
                $employeeId =  $firstReg + 1;
                if ($employeeId  < 10) {
                    $id_no = '000' . $employeeId;
                } else if ($employeeId  < 100) {
                    $id_no = '00' . $employeeId;
                } else if ($employeeId  < 1000) {
                    $id_no = '0' . $employeeId;
                }
            } else {
                $employee = User::where('user_type', 'Employee')->orderBy('id', 'DESC')->first()->id;
                $employeeId =  $employee + 1;
                if ($employeeId  < 10) {
                    $id_no = '000' . $employeeId;
                } else if ($employeeId  < 100) {
                    $id_no = '00' . $employeeId;
                } else if ($employeeId  < 1000) {
                    $id_no = '0' . $employeeId;
                }
            }

            $finalIDNo =  $checkYear . $id_no;
            $user = new User();
            $code = rand(0000, 9999);
            $user->id_no = $finalIDNo;
            $user->password = bcrypt($code);
            $user->user_type = 'Employee';
            $user->code = $code;
            $user->name = $request->name;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));

            $user->designation_id = $request->designation_id;
            $user->salary = $request->salary;
            $user->join_date = date('Y-m-d', strtotime($request->join_date));

            if ($request->hasfile('image')) {
                $destination = 'uploads/employee_images/' . $user->image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/employee_images/', $filename);
                //Save the filename in the db
                $user->image = $filename;
            }
            $user->save();

            // Save to Employee Salary
            $employeeSal = new EmployeeSalaryLog();
            $employeeSal->employee_id = $user->id;
            $employeeSal->wef = date('Y-m-d', strtotime($request->join_date));
            $employeeSal->previous_salary = $request->salary;
            $employeeSal->current_salary = $request->salary;
            $employeeSal->salary_increment = 0;
            $employeeSal->save();
        });
        $notification = array(
            'message' => 'Employee registration inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('employee_registration.index')->with($notification);
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
    public function edit($employee_id)
    {
        $data['user'] = User::where('id', $employee_id)->first();

        $data['designations'] = Designation::all();

        return view('Backend.Employee.Employee_registration.edit', $data);
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
        DB::transaction(function () use ($request, $employee_id) {

            $user = User::where('id', $employee_id)->first();

            $user->name = $request->name;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->designation_id = $request->designation_id;

            if ($request->hasfile('image')) {
                $destination = 'uploads/employee_images/' . $user->image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/employee_images/', $filename);
                //Save the filename in the db
                $user->image = $filename;
            }
            $user->save();
        });
        $notification = array(
            'message' => 'Employee registration updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('employee_registration.index')->with($notification);
    }

    // Export PDF

    public function export_pdf($employee_id)
    {
        $data['model'] = User::where('id', $employee_id)->first();

        $pdf = PDF::loadView('Backend.Employee.Employee_registration.employee_details_pdf', $data);
        // $pdf->setProtection(['copy', 'print'], ' ', 'pass'); //not available

        return $pdf->stream('employee.pdf');
    }
}
