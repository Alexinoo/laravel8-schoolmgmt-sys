<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_attendance extends Model
{
    use HasFactory;

    // Relationship with User model
    public function user()
    {

        return $this->belongsTo(User::class, 'employee_id', 'id');
    }
}
