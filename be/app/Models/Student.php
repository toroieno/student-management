<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'gender',
        'class_id',
        'student_code',
        'cpa',
        'school_credit_debt',
        'school_credit_complete',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function curriculumVitae()
    {
        return $this->hasOne(CurriculumVitae::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function formRegisterProjects()
    {
        return $this->hasMany(FormRegisterProject::class);
    }

    public function formRegisterInternships()
    {
        return $this->hasMany(FormRegisterInternship::class);
    }
}
