<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use App\Models\JobStep;
use App\Models\Meeting;
use App\Models\ResponseGenerator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class JobController extends Controller
{
    public function index(Request $request){
        $data = new Job();
        $data = $data->newQuery();
        $data = $data->with('company');
        return ResponseGenerator::PaginationResponse($data, $request);
    }

    public function companyIndex(Request $request){
        $data = new Job();
        $data = $data->newQuery();
        $data = $data->get();
        foreach ($data as $d){
            $d->total = Application::where('job_id', '=', $d->id)->count();
        }

        return ResponseGenerator::ListResponse($data);
    }


    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "description" => "required",
            "category" => "required",
            "pay_range" => "numeric",
            "country" => 'required',
            "city" => 'required',
            // "open" => 'required|date|after_or_equal:today',
            // "close" => 'required|date|after_or_equal:open',
            "jobStep.*" => 'required|exists:steps,id'
        ]);

        if($validator->fails()){
            return ResponseGenerator::FormikError($validator->errors());
        }

        $data = new Job();
        $data->company_id = $request->user()->company_id;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->category = $request->category;
        $data->pay_range = $request->pay_range;
        $data->country = $request->country;
        $data->city = $request->city;
        $data->open = Carbon::now();
        $data->close = Carbon::now();
        // $data->open = $request->open;
        // $data->close = $request->close;
        $data->save();

        $idx = 1;
        foreach ($request->jobStep as $i){
            $jobStep = new JobStep();
            $jobStep->job_id = $data->id;
            $jobStep->step_id = $i;
            $jobStep->order = $idx;
            $idx++;
            $jobStep->save();
        }

        return ResponseGenerator::SingleResponse($data);
    }

    public function show(Request $request, $id){
        return Job::with('company')->find($id);
    }
}
