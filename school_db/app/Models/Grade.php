<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['id', 'subject_id', 'student_id', 'grade', 'date'];
}
