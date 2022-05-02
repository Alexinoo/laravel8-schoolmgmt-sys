<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = StudentClass::all();
        return view('Backend.Setup.Student_class.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Setup.Student_class.create');
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
            'name' => ['required', 'unique:student_classes,name']
        ]);
        $model = new StudentClass();
        $model->name = $request->name;
        $model->save();

        $notification = array(
            'message' => 'Student class Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student_class.index')->with($notification);
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
        $data  = StudentClass::find($id);

        return view('Backend.Setup.Student_class.edit', compact('data'));
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
            'name' => ['required', 'unique:student_classes,name']
        ]);
        $model = StudentClass::find($id);
        $model->name = $request->name;
        $model->update();

        $notification = array(
            'message' => 'Student class Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student_class.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = StudentClass::find($id);
        $model->delete();

        $notification = array(
            'message' => 'Student class deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('student_class.index')->with($notification);
    }
}
