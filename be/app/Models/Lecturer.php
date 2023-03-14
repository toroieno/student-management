<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'gender',
        'user_id',
    ];

    public function internshipInformations()
    {
        return $this->hasMany(InternshipInformation::class);
    }

    public function detailFormProjects()
    {
        return $this->belongsToMany(DetailFormProject::class);
    }

    public function formRegisterInternships()
    {
        return $this->belongsToMany(FormRegisterInternships::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function researchTopics()
    {
        return $this->hasMany(ResearchTopic::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
