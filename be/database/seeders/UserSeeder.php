<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Student;
use App\Models\Lecturer;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->times(5000)
            ->create()
            ->each(function (User $user) {
                if ($user->role == 1) {
                    Student::factory()->create(['user_id'=>$user->id]);
                }
                elseif ($user->role == 2) {
                    Lecturer::factory()->create(['user_id'=>$user->id]);
                }
            });
    }
}
