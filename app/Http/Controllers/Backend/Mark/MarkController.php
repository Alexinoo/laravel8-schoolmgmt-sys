<?php

namespace App\Http\Controllers\Backend\Mark;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function entries(){

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('Backend.Mark.entries' , $data);

    }
}
