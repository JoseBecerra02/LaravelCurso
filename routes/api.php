<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesorApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Route::resource('profesores', ProfesorApiController::class);

Route::get('profesores', [ProfesorApiController::class, 'index']);	
Route::post('profesores', [ProfesorApiController::class, 'store']);
Route::get('profesores/{id}', [ProfesorApiController::class, 'show']);
Route::post('profesores/{id}', [ProfesorApiController::class, 'update']);
Route::post('profesores/{id}', [ProfesorApiController::class, 'destroy']);