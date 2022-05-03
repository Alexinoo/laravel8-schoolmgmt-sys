<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\FeeAmount;
use App\Models\StudentClass;
use App\Models\StudentRegistration;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class RegistrationFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        return view('Backend.Student.Registration_fee.index', $data);
    }


    public function fetchRegFeeClasswise(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;

        if ($year_id != '') {
            $where[] = ['year_id', 'like', $year_id . '%'];
        }
        if ($class_id != '') {
            $where[] = ['class_id', 'like', $class_id . '%'];
        }
        $allStudent = StudentRegistration::with(['discount'])->where($where)->get();

        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Roll No</th>';
        $html['thsource'] .= '<th>Reg Fee</th>';
        $html['thsource'] .= '<th>Discount </th>';
        $html['thsource'] .= '<th>Student Fee </th>';
        $html['thsource'] .= '<th>Action</th>';

        foreach ($allStudent as $key => $value) {

            $registrationfee = FeeAmount::where('fee_category_id', 2)->where('class_id', $value->class_id)->first();

            $color = 'success';
            $html[$key]['tdsource']  = '<td>' . ($key + 1) . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value->user->id_no . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value->user->name . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value->roll . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $registrationfee->amount . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value->discount->discount . '%' . '</td>';

            $originalfee = $registrationfee->amount;
            $discount =  !empty($value->discount->discount) ? $value->discount->discount : 0;
            $discounttablefee = $discount / 100 * $originalfee;
            $finalfee = (float)$originalfee - (float)$discounttablefee;

            $html[$key]['tdsource'] .= '<td>' . $finalfee . '$' . '</td>';
            $html[$key]['tdsource'] .= '<td>';
            $html[$key]['tdsource'] .= '<a class="btn btn-sm btn-' . $color . '" title="Registration Fee Slip" target="_blanks" href="' . route("registration_fee.slip") . '?class_id=' . $value->class_id . '&student_id=' . $value->student_id . '">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';
        }

        return response()->json($html);
    } // end method 



    // Generate Registration Fee Slip 
    public function RegistrationFeeSlip()
    {
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
