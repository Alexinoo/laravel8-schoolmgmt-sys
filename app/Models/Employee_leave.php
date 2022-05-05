<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_leave extends Model
{
    use HasFactory;

    public function user()
    {

        return $this->belongsTo(User::class, 'employee_id', 'id');
    }
    public function leave_purpose()
    {

        return  $this->belongsTo(Leave_purpose::class, 'leave_purpose_id', 'id');
    }
}
