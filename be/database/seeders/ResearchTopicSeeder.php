<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ResearchTopic;

class ResearchTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResearchTopic::factory()
            ->times(100)
            ->create();
    }
}
