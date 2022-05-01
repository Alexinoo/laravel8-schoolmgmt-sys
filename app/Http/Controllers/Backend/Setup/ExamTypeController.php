<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ExamType::all();
        return view('Backend.Setup.exam_type.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Setup.Exam_type.create');
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
            'name' => ['required', 'unique:exam_types,name']
        ]);
        $user = new ExamType();
        $user->name = $request->name;
        $user->save();

        $notification = array(
            'message' => 'Exam Type Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('exam_type.index')->with($notification);
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
        $data  = ExamType::find($id);

        return view('Backend.Setup.Exam_type.edit', compact('data'));
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
            'name' => ['required', 'unique:exam_types,name']
        ]);
        $user = ExamType::find($id);
        $user->name = $request->name;
        $user->update();

        $notification = array(
            'message' => 'Exam Type Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('exam_type.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = ExamType::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Exam Type deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('exam_type.index')->with($notification);
    }
}
