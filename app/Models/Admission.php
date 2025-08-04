<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;


     protected $fillable = [
        'class_id',
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
    ];



    /**
     * Get the class this admission belongs to.
     *
     * Follows the foreign key: class_id → school_classes.id
     */
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }
}
