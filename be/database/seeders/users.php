<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id' => 4, 'username' => 'A', 'password' => '123456', 'email' => 'A@gmail.com'],
            ['id' => 5, 'username' => 'B', 'password' => '123456', 'email' => 'B@gmail.com'],
            ['id' => 6, 'username' => 'C', 'password' => '123456', 'email' => 'C@gmail.com'],
            ['id' => 7, 'username' => 'D', 'password' => '123456', 'email' => 'D@gmail.com'],
        ]);
    }
}
