<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;


      protected $fillable = [
        'teacher_id',
        'description',
        'level',
        'duration',
        'students',
        'lessons',
        'image',
    ];

    /**
     * Get the teacher that owns the class.
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

}
