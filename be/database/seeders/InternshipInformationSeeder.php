<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InternshipInformation;
use Illuminate\Support\Facades\DB;

class InternshipInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InternshipInformation::factory()
            ->times(100)
            ->create();
    }
}
