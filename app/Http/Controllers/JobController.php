<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobStep;
use App\Models\ResponseGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function index(Request $request){
        $data = new Job();
        $data = $data->newQuery();

        return ResponseGenerator::PaginationResponse($data, $request);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            "company_id" => "required|exists:companies,id",
            "name" => "required",
            "description" => "required",
            "category" => "required",
            "pay_range" => "numeric",
            "country" => 'required',
            "state" => 'required',
            "city" => 'required',
            "open" => 'required|date|after_or_equal:today',
            "close" => 'required|date|after_or_equal:open',
            "steps.*" => 'required|exists:steps,id'
        ]);

        if($validator->fails()){
            return ResponseGenerator::FormikError($validator->errors());
        }

        $data = new Job();
        $data->company_id = $request->company_id;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->category = $request->category;
        $data->pay_range = $request->pay_range;
        $data->country = $request->country;
        $data->state = $request->state;
        $data->city = $request->city;
        $data->open = $request->open;
        $data->close = $request->close;
        $data->save();

        $idx = 1;
        foreach ($request->steps as $i){
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
