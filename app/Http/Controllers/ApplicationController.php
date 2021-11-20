<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationProcess;
use App\Models\BasicTest;
use App\Models\JobStep;
use App\Models\Meeting;
use App\Models\ResponseGenerator;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request){
        $data = new Application();
        $data = $data->newQuery();
        $data = $data->where('user_id','=', $request->user()->id);
        return ResponseGenerator::PaginationResponse($data, $request);
    }

    public function store(Request $request){
        $data = new Application();
        $data->job_id = $request->job_id;
        $data->user_id = $request->user()->id;
        $data->save();

        $jobSteps = JobStep::where('job_id', '=', $request->job_id)->get();
        foreach ($jobSteps as $j){
            $p = new ApplicationProcess();
            $p->job_step_id = $j;
            $p->order = $j->order;
            $p->application_id = $data->id;

            if($j->meeting_type_id != null){
                $meeting = new Meeting();
                $meeting->meeting_type_id = $j->meeting_type_id;
                $meeting->save();
                $p->meeting_id = $meeting->id;
            } else {
                $p->basic_test_id =  BasicTest::inRandomOrder()->first();
            }

            $p->save();
        }

        return ResponseGenerator::SingleResponse($data);
    }


}
