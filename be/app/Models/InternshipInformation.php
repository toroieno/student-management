<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternshipInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'name_company',
        'address_company',
        'description',
        'lecturer_id',
    ];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }
}
