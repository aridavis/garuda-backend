<?php

namespace App\Http\Controllers;

use App\Models\CPQuestion;
use App\Models\ResponseGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CodeController extends Controller
{
    public function index(Request $request)
    {
        return ResponseGenerator::ListResponse(CPQuestion::all());
    }

    public function show(Request  $id){
        return ResponseGenerator::SingleResponse(CPQuestion::find($id));
    }

    public function submit(Request $request)
    {
        $question = CPQuestion::find($request->question_id);
        $response = Http::withHeaders([
            'content-type' => 'application/json',
            'x-rapidapi-host' => 'judge0-ce.p.rapidapi.com',
            'x-rapidapi-key' => '5f7bbc5de6mshab7a679b2e9054ap1f72c0jsnb302a08f3037'
        ])->post("https://judge0-ce.p.rapidapi.com/submissions?base64_encoded=true&fields=*", [
            "language_id" => $request->language_id,
            "source_code" => $request->source_code,
            "stdin" => base64_encode($question->input),
            "expected_output" => base64_encode($question->expected_output)
        ]);
        $token = json_decode($response->body(), true)["token"];
        $submissionResponse = Http::withHeaders([
            'content-type' => 'application/json',
            'x-rapidapi-host' => 'judge0-ce.p.rapidapi.com',
            'x-rapidapi-key' => '5f7bbc5de6mshab7a679b2e9054ap1f72c0jsnb302a08f3037'
        ])->get('https://judge0-ce.p.rapidapi.com/submissions/60a41e3e-f7b0-4b87-8433-05a9292645c5?base64_encoded=true&fields=*');
        return ResponseGenerator::SingleResponse([
            "result" => json_decode($submissionResponse, true)["status"]["description"]
        ]);
    }
}
