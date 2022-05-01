<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = StudentShift::all();
        return view('Backend.Setup.Student_shift.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Setup.Student_shift.create');
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
            'name' => ['required', 'unique:student_shifts,name']
        ]);
        $user = new StudentShift();
        $user->name = $request->name;
        $user->save();

        $notification = array(
            'message' => 'Student shift Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student_shift.index')->with($notification);
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
        $data  = StudentShift::find($id);

        return view('Backend.Setup.Student_shift.edit', compact('data'));
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
        $data = $request->validate([
            'name' => ['required', 'unique:student_shifts,name']
        ]);
        $user = StudentShift::find($id);
        $user->name = $request->name;
        $user->save();

        $notification = array(
            'message' => 'Student shift updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student_shift.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = StudentShift::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student shift deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('student_shift.index')->with($notification);
    }
}
