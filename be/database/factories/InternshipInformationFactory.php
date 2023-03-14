<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lecturer;
use App\Models\InternshipInformation;
use Illuminate\Support\Facades\DB;

class InternshipInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name,
            'name_company' => $this->faker->name,
            'address' => $this->faker->address,
            'description' => $this->faker->text,
            'lecturer_id' => $this->get_unique_id(),
        ];
    }

    public function get_unique_id()
    {
        do
        {
            $get_random_raw = Lecturer::inRandomOrder()->first();
            $lecturer_id = $get_random_raw->id;
            $check = DB::table('internship_informations')
                ->where('lecturer_id', $lecturer_id)->first();
        }
        while(!empty($check));

        return $lecturer_id;
    }
}
