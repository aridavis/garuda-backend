<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    public function process(){
        return $this->hasOne(ApplicationProcess::class);
    }

    public function interviewer(){
        return $this->belongsTo(User::class);
    }
}
