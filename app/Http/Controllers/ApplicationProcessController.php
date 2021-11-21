<?php

namespace App\Http\Controllers;

use App\Models\Application;
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

    public function uploadCv(Request $request){
        $cc = new CloudinaryController();
        $im = $cc->upload($request->file('image_url'), "/users");
        $data = Application::find($request->application_id);
        $data->cv_url = $im["secure_url"];
    }
}
