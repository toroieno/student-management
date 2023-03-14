<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormRegisterInternship extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'semester',
        'time_register',
        'lecturer_id',
        'status_contact',
        'status_check',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }
}
