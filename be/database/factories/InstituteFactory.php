<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Institute;

class InstituteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Institute::class;

    public function definition()
    {
        return [
            'full_name' => $this->faker->unique()->name,
            'institute_code' => $this->faker->unique()->text(5),
        ];
    }

    private function random_unique_str($length)
    {
        do
        {
            $code = Str::random($length);
            $institute_code = Institute::where('institute_code', $code)->first();
        }
        while(!empty($institute_code));

        return $code;
    }
}
