<?php

namespace Database\Seeders;

use App\Models\BasicTestQuestion;
use Illuminate\Database\Seeder;

class BasicQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BasicTestQuestion::insert($this->data());
    }

    private function data()
    {
        return [
            ["question" => "Which of the following multipliers will cause a number to be increased by 29.7%?",
                "a" => "1.297",
                "b" => "12.97",
                "c" => "129.7",
                "d" => "1297",
                "answer" => "a"]
            ,
            ["question" => "The ratio 5 : 4 expressed as a percent equals",
                "a" => "12.5%",
                "b" => "40%",
                "c" => "80%",
                "d" => "125%",
                "answer" => "d"]
            ,
            ["question" => "Shobha's Mathematics Test had 75 problems i.e. 10 arithmetic, 30 algebra and 35 geometry problems. Although she answered 70% of the arithmetic, 40% of the algebra and 60% 0f the geometry problems correctly, she did not pass the test because she got less than 60% of the problems right. How many more questions she would have needed to answer correctly to earn a 60% passing grade?",
                "a" => "5",
                "b" => "10",
                "c" => "15",
                "d" => "20",
                "answer" => "a"]
            ,
            ["question" => "Pipe A can fill a tank in 5 hours, pipe B in 10 hours and pipe C in 30 hours. If all the pipes are open, in how many hours will the tank be filled ?",
                "a" => "2",
                "b" => "2.5",
                "c" => "3",
                "d" => "3.5",
                "answer" => "c"]
            ,
            ["question" => "Two pipes can fill a tank in 20 and 24 minutes respectively and a waste pipe can empty 3 gallons per minute. All the three pipes working together can fill the tank in 15 minutes. The capacity of the tank is",
                "a" => "60 gallons",
                "b" => "80 gallons",
                "c" => "120 gallons",
                "d" => "160 gallons",
                "answer" => "c"
            ]
        ];
    }
}
