<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationProcess;
use App\Models\BasicTest;
use App\Models\Job;
use App\Models\JobStep;
use App\Models\Meeting;
use App\Models\ResponseGenerator;
use App\Models\Step;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request){
        $data = new Application();
        $data = $data->newQuery();
        $data = $data->where('user_id','=', $request->user()->id);
        $data = $data->with('job.company');
        $data = $data->get();
        foreach ($data as $d){
            $notNull = ApplicationProcess::with('jobStep.step')->where('application_id', '=', $d->id)->whereNotNull('result')->orderBy('updated_at', 'desc')->get();
            $d->last_progress = sizeof($notNull) == 0 ? ApplicationProcess::with('jobStep.step')->where('application_id', '=', $d->id)->get()[0] : $notNull[0];
            $d->done = sizeof(ApplicationProcess::where('application_id', '=', $d->id)->whereNotNull('result')->where('pass', '=', 1)->get()) == sizeof(ApplicationProcess::where('application_id', '=', $d->id)->get());
            $d->active = sizeof(ApplicationProcess::where('application_id', '=', $d->id)->whereNotNull('result')->where('pass', '=', 0)->get()) == 0;
        }
        return ResponseGenerator::ListResponse($data);
    }

    public function show($id){
        $data = Application::with("job.company")->with('user')->find($id);
        $process = ApplicationProcess::with('jobStep.step')->where("application_id", '=', $id)->get();

        $last = 0;
        $fail = 0;
        $curr = 0;

        foreach($process as $p){
            $p->name = $p->jobStep->step->name;
            if($p->result != null){
                $last++;
                if($p->pass == false){
                    $fail = 1;
                }
                $p->status = $p->pass ? "complete" : "fail";
            } else {
                if($curr == 0){
                    if(!$fail){
                        $p->status = "current";
                        $curr = 1;
                        continue;
                    }
                }
                $p->status = $fail ? "cancelled" : "upcoming";
            }
        }
        $data->process = $process;
        return ResponseGenerator::SingleResponse($data);
    }

    public function companyIndex(Request $request){
        $data = new Application();
        $data = $data->newQuery();

        $data = $data->whereIn('job_id', Job::where('company_id', $request->user()->company->id)->pluck('id'));
        $data = $data->with('job.company');
        $data = $data->with('user');
        $data = $data->get();
        foreach ($data as $d){
            $notNull = ApplicationProcess::with('jobStep.step')->where('application_id', '=', $d->id)->whereNotNull('result')->orderBy('updated_at', 'desc')->get();
            $d->last_progress = sizeof($notNull) == 0 ? ApplicationProcess::with('jobStep.step')->where('application_id', '=', $d->id)->get()[0] : $notNull[0];
            $d->done = sizeof(ApplicationProcess::where('application_id', '=', $d->id)->whereNotNull('result')->where('pass', '=', 1)->get()) == sizeof(ApplicationProcess::where('application_id', '=', $d->id)->get());
            $d->active = sizeof(ApplicationProcess::where('application_id', '=', $d->id)->whereNotNull('result')->where('pass', '=', 0)->get()) == 0;
        }
        return ResponseGenerator::ListResponse($data);
    }

    public function store(Request $request){
        $data = Application::where('job_id', '=', $request->job_id)->where('user_id', '=', $request->user()->id)->first();

        if($data == null){
            $data = new Application();
            $data->job_id = $request->job_id;
            $data->user_id = $request->user()->id;
            $data->save();

            $jobSteps = JobStep::where('job_id', '=', $request->job_id)->get();
            foreach ($jobSteps as $j){
                $p = new ApplicationProcess();
                $p->job_step_id = $j->id;
                $p->order = $j->order;
                $p->application_id = $data->id;


                $meeting = new Meeting();
                $meeting->meeting_type_id = $j->step_id == 4 ? 2 : 1;
                $meeting->save();
                $p->meeting_id = $meeting->id;
                $p->save();
            }

            return ResponseGenerator::SingleResponse($data);
        } else{
            return ResponseGenerator::ErrorResponse("You have applied to this job.");
        }


    }

    public function pass(Request $request){
        $data = ApplicationProcess::find($request->application_process_id);
        $data->pass = 1;
        $data->result = $request->result;
        $data->save();
    }

    public function fail(Request $request){
        $data = ApplicationProcess::find($request->application_process_id);
        $data->pass = 0;
        $data->result = $request->result;
        $data->save();
    }
}
