<?php

namespace Database\Seeders;

use App\Models\Institute;
use App\Models\InternshipInformation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            InstituteSeeder::class,
            ClassSeeder::class,
            ResearchTopicSeeder::class,
            CurriculumVitaeSeeder::class,
            FormRegisterProjectSeeder::class,
            FormRegisterInternshipSeeder::class,
            InternshipInformationSeeder::class,
        ]);
    }
}
