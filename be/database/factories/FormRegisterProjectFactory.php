<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;

class FormRegisterProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'semester' => random_int(1, 3),
            'time_register' => $this->faker->dateTime,
            'student_id' => $this->get_student_id(),
        ];
    }

    public function get_student_id()
    {
        $get_random_raw = Student::inRandomOrder()->first();
        $lecturer_id = $get_random_raw->id;

        return $lecturer_id;
    }
}
