<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Major;
use App\Models\Lecturer;
use App\Models\ResearchTopic;

class ResearchTopicFactory extends Factory
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
            'description' => $this->faker->text,
            'major_id' => $this->get_unique_id('major_id'),
            'lecturer_id' => $this->get_unique_id('lecturer_id'),
        ];
    }

    public function get_unique_id($model)
    {
        do
        {
            if ($model == 'major_id'){
                $get_random_raw = Major::inRandomOrder()->first();
            }
            elseif ($model == 'lecturer_id') {
                $get_random_raw = Lecturer::inRandomOrder()->first();
            }
            $foreign_id = $get_random_raw->id;
            $check = ResearchTopic::where($model, $foreign_id)->first();
        }
        while(!empty($check));

        return $foreign_id;
    }
}
