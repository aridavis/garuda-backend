<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function(){
    Route::middleware('auth:api')->group(function(){
        Route::get('user', [\App\Http\Controllers\AuthController::class, 'user']);
        Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    });
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('co/login', [\App\Http\Controllers\AuthController::class, 'loginCompany']);
});

Route::middleware('auth:api')->group(function(){
    Route::prefix('applications')->group(function(){
        Route::get('{id}', [\App\Http\Controllers\ApplicationController::class, 'show']);
        Route::post('filter', [\App\Http\Controllers\ApplicationController::class, 'index']);
        Route::post('store', [\App\Http\Controllers\ApplicationController::class, 'store']);
    });

    Route::prefix('application-process')->group(function(){
        Route::get("{id}", [\App\Http\Controllers\ApplicationProcessController::class, 'show']);
        Route::post('cv', [\App\Http\Controllers\ApplicationProcessController::class, 'uploadCv']);
        Route::post('answer', [\App\Http\Controllers\ApplicationProcessController::class, 'answer']);
        Route::post('pass', [\App\Http\Controllers\ApplicationController::class, 'pass']);
        Route::post('fail', [\App\Http\Controllers\ApplicationController::class, 'fail']);
    });

    Route::prefix('jobs')->group(function(){
        Route::post('filter', [\App\Http\Controllers\JobController::class, 'index']);
    });

    Route::prefix('basic-questions')->group(function(){
        Route::get('/',  [\App\Http\Controllers\BasicQuestionController::class, 'index']);
    });

    Route::prefix('co')->group(function(){
        Route::post('jobs/filter', [\App\Http\Controllers\JobController::class, 'companyIndex']);
        Route::post('jobs/store', [\App\Http\Controllers\JobController::class, 'store']);
        Route::post("applications/filter", [\App\Http\Controllers\ApplicationController::class, 'companyIndex']);
    });

    Route::prefix("meeting")->group(function(){
        Route::get("{id}", [\App\Http\Controllers\MeetingController::class, 'show']);
        Route::put("{id}", [\App\Http\Controllers\MeetingController::class, 'join']);
    });
});

Route::prefix('codes')->group(function(){
    Route::get('/', [\App\Http\Controllers\CodeController::class, 'index']);
    Route::get('/{id}', [\App\Http\Controllers\CodeController::class, 'show']);
    Route::post('submit', [\App\Http\Controllers\CodeController::class, 'submit']);
});

Route::prefix('users')->group(function(){
    Route::post("jobseeker", [\App\Http\Controllers\UserController::class, 'registerJobseeker']);
});
