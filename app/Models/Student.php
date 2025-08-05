<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'class',
        'first_name',
        'last_name',
        'gender',
        'shift',
        'admission_date',
        'birthday',
        'blood_group',
        'student_phone',
        'student_email',
        'religion',
        'present_address',
        'permanent_address',
        'city',
        'state',
        'student_photo',
        'school_name',
        'guardian_name',
        'guardian_phone',
        'guardian_photo',
        'section',
        'student_group',
        'status',
    ];

}
