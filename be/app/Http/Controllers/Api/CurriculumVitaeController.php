<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CurriculumVitae;

class CurriculumVitaeController extends Controller
{
    public function index()
    {
        $data = CurriculumVitae::query()->get();

        return response()->json($data, 201);
    }
}
