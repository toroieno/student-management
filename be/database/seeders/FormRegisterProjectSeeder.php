<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormRegisterProject;
use App\Models\DetailFormProject;

class FormRegisterProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormRegisterProject::factory()
            ->times(100)
            ->create()
            ->each(function (FormRegisterProject $form) {
                DetailFormProject::factory()
                    ->times(3)
                    ->create(['form_register_project_id' => $form->id]);
            });
    }
}
