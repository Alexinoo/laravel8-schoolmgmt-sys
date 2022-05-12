<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
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
    public function UpdateStudentMarks(Request $request){

        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $subject_id = $request->subject_id;
        $exam_type_id = $request->exam_type_id;

        $data = Student_mark::with(['user'])->where('year_id', $year_id)->where('class_id' , $class_id)->where('subject_id', $subject_id)->where('exam_type_id', $exam_type_id)->get();

        return response()->json($data);

    }
}
