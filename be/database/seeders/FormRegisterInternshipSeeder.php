<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormRegisterInternship;

class FormRegisterInternshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormRegisterInternship::factory()
            ->times(100)
            ->create();
    }
}
