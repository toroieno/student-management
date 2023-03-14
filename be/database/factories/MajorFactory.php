<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Major;

class MajorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Major::class;

    public function definition()
    {
        return [
            'full_name' => $this->faker->name,
            'major_code' => $this->random_unique_str(2),
        ];
    }

    private function random_unique_str($length)
    {
        do
        {
            $code = Str::random($length).random_int(0,5);
            $major_code = Major::where('major_code', $code)->first();
        }
        while(!empty($major_code));

        return $code;
    }
}
