<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = StudentYear::all();
        return view('Backend.Setup.Student_year.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Setup.Student_year.create');
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
            'name' => ['required', 'unique:student_years,name']
        ]);
        $user = new StudentYear();
        $user->name = $request->name;
        $user->save();

        $notification = array(
            'message' => 'Student year Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student_year.index')->with($notification);
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
        $data  = StudentYear::find($id);

        return view('Backend.Setup.Student_year.edit', compact('data'));
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
            'name' => ['required', 'unique:student_years,name']
        ]);
        $user = StudentYear::find($id);
        $user->name = $request->name;
        $user->update();

        $notification = array(
            'message' => 'Student year Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student_year.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = StudentYear::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student year deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('student_year.index')->with($notification);
    }
}
