<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationProcess;
use App\Models\BasicTestQuestion;
use App\Models\BasicTestResult;
use App\Models\ImageUploader;
use App\Models\ResponseGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationProcessController extends Controller
{
    public function answer(Request $request)
    {
        $correct = 0;
        foreach ($request->answers as $a) {
            $question = BasicTestQuestion::find($a["basic_test_question_id"]);
            $ans = new BasicTestResult();
            $ans->user_answer = $a["answer"];
            $ans->application_process_id = $request["application_process_id"];
            $ans->basic_test_question_id = $a["basic_test_question_id"];

            if ($question->answer == $a["answer"]) {
                $correct++;
            }
            $ans->save();
        }
        $process = ApplicationProcess::find($request["application_process_id"]);
        $process->result = "Total Correct: " . $correct;
        $process->pass = $correct > 3;
        $process->save();
    }

    public function uploadCv(Request $request)
    {
        $data = Application::find($request->application_id);
        $data->cv_url = ImageUploader::UploadImage($request->name, $request->file('cv'));;
        $data->save();
    }

    public function show($id){
        return ResponseGenerator::SingleResponse(ApplicationProcess::find($id));
    }
}
