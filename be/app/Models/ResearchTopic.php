<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchTopic extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecturer_id',
        'full_name',
        'description',
        'major_id'
    ];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
