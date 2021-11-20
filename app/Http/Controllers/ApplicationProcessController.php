<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationProcessController extends Controller
{
    public function answer(Request $request){
        foreach ($request->answers as $a){
            $a->user_answer = $a["answer"];
            $a->application_process_id = $request->application_process_id;
            $a->basic_test_question_id = $request->basic_test_question_id;
            $a->save();
        }
    }
}
