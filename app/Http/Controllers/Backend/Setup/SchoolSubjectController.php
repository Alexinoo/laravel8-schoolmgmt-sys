<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SchoolSubject::all();
        return view('Backend.Setup.School_subject.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Setup.School_subject.create');
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
            'name' => ['required', 'unique:school_subjects,name']
        ]);
        $user = new SchoolSubject();
        $user->name = $request->name;
        $user->save();

        $notification = array(
            'message' => 'School Subject Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('school_subject.index')->with($notification);
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
        $data  = SchoolSubject::find($id);

        return view('Backend.Setup.School_subject.edit', compact('data'));
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
            'name' => ['required', 'unique:school_subjects,name']
        ]);
        $user = SchoolSubject::find($id);
        $user->name = $request->name;
        $user->update();

        $notification = array(
            'message' => 'School Subject Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('school_subject.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = SchoolSubject::find($id);
        $user->delete();

        $notification = array(
            'message' => 'School Subject deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('school_subject.index')->with($notification);
    }
}
