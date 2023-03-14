<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumVitae extends Model
{
    use HasFactory;

    protected $fillable = [
        'skill',
        'hobby',
        'education',
        'activity',
        'experience',
        'project',
        'summary',
        'student_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
