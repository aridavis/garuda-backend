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
});

Route::middleware('auth:api')->group(function(){
    Route::prefix('applications')->group(function(){
        Route::post('filter', [\App\Http\Controllers\ApplicationController::class, 'index']);
        Route::post('store', [\App\Http\Controllers\ApplicationController::class, 'store']);
    });

    Route::prefix('application-process')->group(function(){
        Route::post('answer', [\App\Http\Controllers\ApplicationProcessController::class, 'answer']);
    });

    Route::prefix('jobs')->group(function(){
        Route::post('filter', [\App\Http\Controllers\JobController::class, 'index']);
        Route::post('store', [\App\Http\Controllers\JobController::class, 'store']);
    });

    Route::prefix('basic-questions')->group(function(){
        Route::get('/',  [\App\Http\Controllers\BasicQuestionController::class, 'index']);
    });

    Route::prefix('users')->group(function(){
        Route::post("jobseeker", [\App\Http\Controllers\UserController::class, 'registerJobseeker']);
    });
});

Route::prefix('codes')->group(function(){
    Route::get('/', [\App\Http\Controllers\CodeController::class, 'index']);
    Route::get('/{id}', [\App\Http\Controllers\CodeController::class, 'show']);
    Route::post('submit', [\App\Http\Controllers\CodeController::class, 'submit']);
});
