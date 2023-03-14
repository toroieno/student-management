<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormRegisterProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'project_id',
        'semester',
        'time_register',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function detailFormProjects()
    {
        return $this->hasMany(DetailFormProject::class);
    }
}
