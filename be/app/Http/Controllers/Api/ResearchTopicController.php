<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ResearchTopic;
use Illuminate\Support\Facades\DB;

class ResearchTopicController extends Controller
{
    public function index()
    {
        DB::enableQueryLog();
        $data = DB::table('research_topics')->get();

        dd(DB::getQueryLog());
        return response()->json($data->toSql(), 201);
    }
}
