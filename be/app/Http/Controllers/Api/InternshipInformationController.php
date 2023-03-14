<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InternshipInformation;
use Illuminate\Support\Facades\DB;

class InternshipInformationController extends Controller
{
    public function index()
    {
        DB::enableQueryLog();

        $data = DB::table('internship_informations')->get();

        dd(DB::getQueryLog());

        return $data;
    }
}
