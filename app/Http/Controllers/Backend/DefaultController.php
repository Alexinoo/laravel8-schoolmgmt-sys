<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Account_student_fee;
use App\Models\AssignSubject;
use App\Models\FeeAmount;
use App\Models\Student_mark;
use App\Models\StudentRegistration;
use Illuminate\Http\Request;

class DefaultController extends Controller
{

    // Fetch Subjects and populate to Subject dropdown
    public function fetchSubjects(Request $request){

        $class_id = $request->class_id;

        $data = AssignSubject::with(['school_subject'])->where('class_id' , $class_id)->get();

        return response()->json($data);

    }


    // Populate students and the marks for entries
    public function getStudentMarks(Request $request){

        $year_id = $request->year_id;
        $class_id = $request->class_id;

        $data = StudentRegistration::with(['user'])->where('year_id', $year_id)->where('class_id' , $class_id)->get();

        return response()->json($data);

    }


    // Get student marks Previously stored for update
    public function getStudentMarksForUpdate(Request $request){

        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $subject_id = $request->subject_id;
        $exam_type_id = $request->exam_type_id;

        $data = Student_mark::with(['user'])->where('year_id', $year_id)->where('class_id' , $class_id)->where('subject_id', $subject_id)->where('exam_type_id', $exam_type_id)->get();

        return response()->json($data);

    }

    
    // Get student fees from Accounts
    public function fetchStudAccFees(Request $request)
    {

        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $fee_category_id = $request->fee_category_id;
        $date = date('Y-m', strtotime($request->date));

        $data = StudentRegistration::with(['discount'])->where('year_id', $year_id)->where('class_id', $class_id)->get();

        $html['thsource']  = '<th>Reg No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Father Name</th>';
        $html['thsource'] .= '<th>Original Fee </th>';
        $html['thsource'] .= '<th>Discount Amount</th>';
        $html['thsource'] .= '<th>Fee (This Student)</th>';
        $html['thsource'] .= '<th>Select</th>';

        foreach ($data as $key => $std) {

            $registrationfee = FeeAmount::where('fee_category_id', $fee_category_id)->where('class_id', $std->class_id)->first();

            $accountstudentfees = Account_student_fee::where('student_id', $std->student_id)->where('year_id', $std->year_id)->where('class_id', $std->class_id)->where('fee_category_id', $fee_category_id)->where('date', $date)->first();

            if ($accountstudentfees != null) {
                $checked = 'checked';
            } else {
                $checked = '';
            }
            $color = 'success';
            $html[$key]['tdsource']  = '<td>' . $std->user->id_no . '<input type="hidden" name="fee_category_id" value= " ' . $fee_category_id . ' " >' . '</td>';

            $html[$key]['tdsource']  .= '<td>' . $std->user->name . '<input type="hidden" name="year_id" value= " ' . $std->year_id . ' " >' . '</td>';

            $html[$key]['tdsource']  .= '<td>' . $std->user->father_name . '<input type="hidden" name="class_id" value= " ' . $std->class_id . ' " >' . '</td>';

            $html[$key]['tdsource']  .= '<td>' . $registrationfee->amount . '$' . '<input type="hidden" name="date" value= " ' . $date . ' " >' . '</td>';

            $html[$key]['tdsource'] .= '<td>' . $std->discount->discount . '%' . '</td>';

            $orginalfee = $registrationfee->amount;
            $discount =  $std->discount->discount ;
            $discountablefee = $discount / 100 * $orginalfee;
            $finalfee = (int)$orginalfee - (int)$discountablefee;

            $html[$key]['tdsource'] .= '<td>' . '<input type="text" name="amount[]" value="' . $finalfee . ' " readonly class="form-control" />' . '</td>';

            $html[$key]['tdsource'] .= '<td>' . '<input type="hidden" name="student_id[]" value="' . $std->student_id . '" />' . '<input type="checkbox" name="checkmanage[]" id="id{{$key}}" value="' . $key . '" ' . $checked . ' style="transform: scale(1.5);margin-left: 10px;" /> <label for="id{{$key}}"> </label> ' . '</td>';
        }
        return response()->json(@$html);
    }
}
