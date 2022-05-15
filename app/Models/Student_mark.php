<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_mark extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class , 'student_id' , 'id');
    }
    public function year(){
        return $this->belongsTo(StudentYear::class,'year_id','id');
    }
    public function class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
    public function student(){
        return $this->belongsTo(StudentRegistration::class,'student_id','id');
    }
    public function exam(){
        return $this->belongsTo(ExamType::class,'exam_type_id','id');
    }

    
}
