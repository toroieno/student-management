<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'major_code',
        'institute_id',
    ];

    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }

    public function classes()
    {
        return $this->hasMany(Classe::class);
    }

    public function researchTopics()
    {
        return $this->hasMany(ResearchTopic::class);
    }
}
