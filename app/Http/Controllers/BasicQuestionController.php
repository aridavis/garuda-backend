<?php

namespace App\Http\Controllers;

use App\Models\BasicTestQuestion;
use App\Models\ResponseGenerator;
use Illuminate\Http\Request;

class BasicQuestionController extends Controller
{
    public function index(){
        return ResponseGenerator::ListResponse(BasicTestQuestion::all());
    }
}
