<?php

namespace Database\Factories;

use App\Models\CurriculumVitae;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;

class CurriculumVitaeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'skill' => $this->faker->text,
            'hobby' => $this->faker->text,
            'education' => $this->faker->text,
            'activity' => $this->faker->text,
            'experience' => $this->faker->text,
            'project' => $this->faker->text,
            'summary' => $this->faker->text,
            'student_id' => $this->get_student_id(),
        ];
    }

    public function get_student_id()
    {
        do
        {
            $get_random_raw = Student::inRandomOrder()->first();
            $student_id = $get_random_raw->id;
            $check = CurriculumVitae::where('student_id', $student_id)->first();
        }
        while (!empty($check));

        return $student_id;
    }
}
