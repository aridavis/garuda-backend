<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobStep extends Model
{
    use HasFactory;

    public function job(){
        return $this->hasMany(Job::class);
    }

    public function step(){
        return $this->belongsTo(Step::class);
    }
}
