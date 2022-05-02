<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
    public function year()
    {
        return $this->belongsTo(StudentYear::class, 'year_id', 'id');
    }
    public function class()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }

    // Abit Tricky - Reversal
    public function discount()
    {
        return $this->belongsTo(DiscountStudent::class, 'student_id', 'student_id');
    }
}
