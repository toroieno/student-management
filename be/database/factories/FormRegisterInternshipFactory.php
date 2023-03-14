<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\Lecturer;

class FormRegisterInternshipFactory extends Factory
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
            'status_contact' => random_int(0, 1),
            'status_check' => random_int(0, 1),
            'student_id' => $this->get_student_id(),
            'lecturer_id' => $this->get_lecturer_id(),
        ];
    }

    public function get_student_id()
    {
        $get_random_raw = Student::inRandomOrder()->first();
        $lecturer_id = $get_random_raw->id;

        return $lecturer_id;
    }

    public function get_lecturer_id()
    {
        $get_random_raw = Lecturer::inRandomOrder()->first();
        $lecturer_id = $get_random_raw->id;

        return $lecturer_id;
    }
}
