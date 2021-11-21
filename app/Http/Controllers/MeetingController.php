<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\ResponseGenerator;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function join(Request $request, $id){
        $meeting = Meeting::find($id);
        $meeting->started = true;
        $meeting->socket_id = $request->socket_id;
        $meeting->interviewer_id = $request->user()->id;
        $meeting->save();
    }

    public function show($id){
        return ResponseGenerator::SingleResponse(Meeting::with('interviewer')->with('process.application.user')->find($id));
    }
}
