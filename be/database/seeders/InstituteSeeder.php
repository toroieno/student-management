<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Institute;
use App\Models\Major;

class InstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Institute::factory()
            ->times(50)
            ->create()
            ->each(function (Institute $institute) {
                Major::factory()
                    ->times(5)
                    ->create(['institute_id'=>$institute->id]);
            });
    }
}
