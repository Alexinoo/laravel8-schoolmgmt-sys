<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FeeCategory::all();
        return view('Backend.Setup.Fee_category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Setup.Fee_category.create');
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
            'name' => ['required', 'unique:Fee_categories,name']
        ]);
        $user = new FeeCategory();
        $user->name = $request->name;
        $user->save();

        $notification = array(
            'message' => 'Fee category Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee_category.index')->with($notification);
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
        $data  = FeeCategory::find($id);

        return view('Backend.Setup.Fee_category.edit', compact('data'));
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
            'name' => ['required', 'unique:Fee_categories,name']
        ]);
        $user = FeeCategory::find($id);
        $user->name = $request->name;
        $user->save();

        $notification = array(
            'message' => 'Fee category updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee_category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = FeeCategory::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Fee category deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('fee_category.index')->with($notification);
    }
}
