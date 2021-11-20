<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = ["Jobseeker", "Recruiter", "Interviewer"];
        foreach ($s as $i){
            $role = new Role();
            $role->name = $i;
            $role->save();
        }
    }
}
