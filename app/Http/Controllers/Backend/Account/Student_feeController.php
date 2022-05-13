<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\Account_student_fee;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class Student_feeController extends Controller
{
    public function index(){

        $data['model'] = Account_student_fee::all();

        return view('Backend.Account.Student_fee.index' ,$data);
    }
    public function create(){

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['fee_categories'] = FeeCategory::all();

        return view('Backend.Account.Student_fee.create',$data);
    }
    public function edit($id){

        $data = Account_student_fee::where('id' , $id)->first();
        return view('Backend.Account.Student_fee.create', $data);
    }

    public function store(Request $request){

        $date = date('Y-m', strtotime($request->date));

        // Delete if any
        Account_student_fee::where('year_id', $request->year_id)->where('class_id', $request->class_id)->where('fee_category_id', $request->fee_category_id)->where('date', $request->date)->delete();

        // Then Insert
        $checkedData = $request->checkmanage;
        if($checkedData !=null ){

            for ($i=0; $i <count($checkedData) ; $i++) { 
              
                $model = new Account_student_fee;
                $model->year_id = $request->year_id;
                $model->class_id = $request->class_id;
                $model->fee_category_id = $request->fee_category_id;
                $model->date = $date;
                $model->student_id = $request->student_id[$checkedData[$i] ];
                $model->amount = $request->amount[$checkedData[$i]];
                $model->save();
            }
        }

        if(!empty(@$model) || empty($model) ){

            $notification = array(
                'message' => 'Well Done Data Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('student_fee.index')->with($notification);
        }else{

            $notification = array(
                'message' => 'Sorry !, Data not saved',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

        }
    }
}
