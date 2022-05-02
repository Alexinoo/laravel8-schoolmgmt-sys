<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Designation::all();
        return view('Backend.Setup.Designation.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Setup.Designation.create');
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
            'name' => ['required', 'unique:designations,name']
        ]);
        $model = new Designation();
        $model->name = $request->name;
        $model->save();

        $notification = array(
            'message' => 'Designation Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('designation.index')->with($notification);
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
        $data  = Designation::find($id);

        return view('Backend.Setup.Designation.edit', compact('data'));
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
            'name' => ['required', 'unique:designations,name']
        ]);
        $model = Designation::find($id);
        $model->name = $request->name;
        $model->update();

        $notification = array(
            'message' => 'Designation Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('designation.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Designation::find($id);
        $model->delete();

        $notification = array(
            'message' => 'Designation deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('designation.index')->with($notification);
    }
}
