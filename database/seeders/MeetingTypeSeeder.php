<?php

namespace Database\Seeders;

use App\Models\MeetingType;
use Illuminate\Database\Seeder;

class MeetingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = ["Default", "Programming", "Excel", "Website"];
        foreach ($s as $i){
            $role = new MeetingType();
            $role->name = $i;
            $role->save();
        }
    }
}
