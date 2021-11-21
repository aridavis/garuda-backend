<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationProcess extends Model
{
    use HasFactory;

    public function jobStep(){
        return $this->belongsTo(JobStep::class);
    }

    public function application(){
        return $this->belongsTo(Application::class);
    }
}
