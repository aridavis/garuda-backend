<?php

namespace Database\Seeders;

use App\Models\Step;
use Illuminate\Database\Seeder;

class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $steps = ["CV Review", "Aptitude Test",  "HR Interview", "User Interview (Programming)", "User Interview"];
        foreach ($steps as $s){
            $data = new Step();
            $data->name = $s;
            $data->save();
        }
    }
}
