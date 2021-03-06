<?php

namespace Database\Seeders;

use App\Models\Meeting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BasicQuestionSeeder::class);
        $this->call(StepSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(MeetingTypeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CodeSeeder::class);
        $this->call(JobSeeder::class);

        $meet = new Meeting();
        $meet->meeting_type_id = 1;
        $meet->save();
    }
}
