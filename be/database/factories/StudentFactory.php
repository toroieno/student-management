<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Student;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Student::class;

    public function definition()
    {
        return [
            'full_name' => $this->faker->userName,
            'gender' => random_int(0, 1),
            'student_code' => $this->unique_code(),
            'cpa' => random_int(0, 4),
            'school_credit_debt' => random_int(0, 24),
            'school_credit_complete' => random_int(0, 128),
        ];
    }

    private function unique_code()
    {
        do
        {
            $code = random_int(2019, 2023).random_int(1000, 9999);
            $student_code = Student::where('student_code', $code)->first();
        }
        while(!empty($student_code));

        return $code;
    }
}
