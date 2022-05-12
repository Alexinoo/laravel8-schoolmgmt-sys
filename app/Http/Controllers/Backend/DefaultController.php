<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\StudentRegistration;
use Illuminate\Http\Request;

class DefaultController extends Controller
{

    public function fetchSubjects(Request $request){

        $class_id = $request->class_id;

        $data = AssignSubject::with(['school_subject'])->where('class_id' , $class_id)->get();

        return response()->json($data);

    }
    public function getStudentMarks(Request $request){

        $year_id = $request->year_id;
        $class_id = $request->class_id;

        $data = StudentRegistration::with(['user'])->where('year_id', $year_id)->where('class_id' , $class_id)->get();

        return response()->json($data);

    }
}
