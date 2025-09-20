<?php

use App\Http\Controllers\api\CarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('car', CarController::class);
Route::post('cars/search', [CarController::class,'search']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
