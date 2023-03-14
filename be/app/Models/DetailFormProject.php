<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailFormProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecturer_id',
        'status_contact',
        'status_check',
        'topic_orientation',
        'type_project',
        'desired_order',
    ];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function formRegisterProject()
    {
        return $this->belongsTo(FormRegisterProject::class);
    }
}
