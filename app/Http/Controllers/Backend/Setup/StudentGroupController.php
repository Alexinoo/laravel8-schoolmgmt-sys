<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = StudentGroup::all();
        return view('Backend.Setup.Student_group.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Setup.Student_group.create');
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
            'name' => ['required', 'unique:student_groups,name']
        ]);
        $user = new StudentGroup();
        $user->name = $request->name;
        $user->save();

        $notification = array(
            'message' => 'Student group Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student_group.index')->with($notification);
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
        $data  = StudentGroup::find($id);

        return view('Backend.Setup.Student_group.edit', compact('data'));
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
            'name' => ['required', 'unique:student_groups,name']
        ]);
        $user = StudentGroup::find($id);
        $user->name = $request->name;
        $user->save();

        $notification = array(
            'message' => 'Student group updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student_group.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = StudentGroup::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student group deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('student_group.index')->with($notification);
    }
}
