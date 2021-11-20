<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\ResponseGenerator;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function join(Request $request){
        $meeting = Meeting::find($request->meeting_id);
        $meeting->started = true;
        $meeting->socket_id = $request->socket_id;
        $meeting->save();
    }

    public function show($id){
        return ResponseGenerator::SingleResponse(Meeting::find($id));
    }
}
