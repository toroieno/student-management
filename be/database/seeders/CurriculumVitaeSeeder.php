<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CurriculumVitae;

class CurriculumVitaeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CurriculumVitae::factory()
            ->times(1000)
            ->create();
    }
}
