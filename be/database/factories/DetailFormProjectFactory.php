<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Lecturer;
use App\Models\DetailFormProject;

class DetailFormProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status_contact' => random_int(0, 1),
            'status_check' => random_int(0, 1),
            'topic_orientation' => Str::random(20),
            'type_project' => random_int(1, 3),
            'desired_order' => random_int(1, 3),
            'lecturer_id' => $this->get_lecturer_id(),
        ];
    }

    public function get_lecturer_id()
    {
        $get_random_raw = Lecturer::inRandomOrder()->first();
        $lecturer_id = $get_random_raw->id;

        return $lecturer_id;
    }
}
