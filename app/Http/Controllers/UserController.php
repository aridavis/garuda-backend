<?php

namespace App\Http\Controllers;

use App\Models\ResponseGenerator;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function registerJobseeker(Request $request){
        $validator = Validator::make($request->all(), [
            "first_name" => "required",
            "last_name" => "required",
            "image_url" => "required",
            "country" => "required",
            "city" => "required",
            "address" => "required",
            "state" => "required",
            "phone" => "required",
            "dob" => "required",
            "interest" => "required",
            "email" => "required|email",
            "password" => "required"
        ]);

        if($validator->fails()){
            return ResponseGenerator::FormikError($validator->errors());
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->image_url = $request->image_url;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->phone = $request->phone;
        $user->dob = Carbon::parse($request->dob)->setTimezone('Asia/Jakarta');
        $user->interest = $request->interest;
        $user->company_id = $request->company_id;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role_id = 1;
        $user->save();
    }
}
