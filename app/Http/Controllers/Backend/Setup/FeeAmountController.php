<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = FeeAmount::all(); Eloquent ORM
        $data = FeeAmount::select('fee_category_id')
            ->groupBy('fee_category_id')
            ->get();

        return view('Backend.Setup.Fee_amount.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fee_categories = FeeCategory::all();
        $classes = StudentClass::all();
        return view('Backend.Setup.Fee_amount.create', [
            'fee_categories' => $fee_categories,
            'classes' => $classes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $countClass = count($request->class_id);
        if ($countClass != null) {

            for ($i = 0; $i < $countClass; $i++) {

                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
        }
        $notification = array(
            'message' => 'Fee Amount Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee_category_amount.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($fee_category_id)
    {
        // Filter by fee_category_id
        $data  = FeeAmount::where('fee_category_id', $fee_category_id)
            ->orderBy('class_id', 'ASC')
            ->get();

        return view('Backend.Setup.Fee_amount.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($fee_category_id)
    {
        // Filter by fee_category_id
        $data  = FeeAmount::where('fee_category_id', $fee_category_id)
            ->orderBy('class_id', 'ASC')
            ->get();
        $fee_categories = FeeCategory::all();

        $classes = StudentClass::all();

        return view('Backend.Setup.Fee_amount.edit', compact('data', 'fee_categories', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fee_category_id)
    {
        if ($request->class_id == null) {
            $notification = array(
                'message' => 'Sorry, You did not select any class amount',
                'alert-type' => 'error'
            );

            return redirect()->route('fee_category_amount.edit', $fee_category_id)->with($notification);
        } else {

            $countClass = count($request->class_id);

            // Delete selected
            FeeAmount::where('fee_category_id', $fee_category_id)->delete();

            //  Then re-upload afresh
            for ($i = 0; $i < $countClass; $i++) {

                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
        }
        $notification = array(
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee_category_amount.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
