<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;

class UserController extends Controller
{
    protected $user = User::class;

    public function index()
    {
        $students = User::query()->get();

        return response()->json($students, 201);
    }

    public function test(User $user)
    {
        // $users = User::select("*")
        //                 ->inRandomOrder()
        //                 ->first();
        $users = $user->select("*")
                        ->inRandomOrder()
                        ->first();

        dd($users->id);
    }

    public function show($id)
    {
        $user = User::find($id);

        if ($user->role == 1){
            $result = $user
                        ->join('students', function ($join) use ($user) {
                            $join->on('users.id', '=', 'students.user_id')
                                ->where('students.user_id', $user->id);
                        })
                        ->get();

        }
        elseif ($user->role == 2){
            $result = $user
                        ->join('lecturers', function ($join) use ($user) {
                            $join->on('users.id', '=', 'lecturers.user_id')
                                ->where('lecturers.user_id', $user->id);
                        })
                        ->get();
        }

        return response()->json($result, 200);
    }

    public function destroy($id)
    {
        User::query()->where('id', $id)->delete();

        return response()->json(['message' => 'success'], 200);
    }
}
