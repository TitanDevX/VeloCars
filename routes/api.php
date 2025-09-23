<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\api\BranchController;
use App\Http\Controllers\api\CarController;
use App\Http\Controllers\api\CarDetailsController;
use App\Http\Controllers\api\CarIssueController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('cars', [CarController::class, 'index']);
Route::post('cars/search', [CarController::class, 'search']);
Route::get('car/{car}', [CarController::class, 'show']);

Route::get('branches', [BranchController::class, 'index']);
Route::get('branch/{branch}', [BranchController::class, 'show']);

Route::get('cardetail/{car}', [CarDetailsController::class, 'show']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('car', CarController::class)->except('index', 'show');
    Route::apiResource('branch', BranchController::class)->except('index', 'show');
    Route::post('cardetail/{car}', [CarDetailsController::class, 'store']);
    Route::put('cardetail/{car}', [CarDetailsController::class, 'update']);
    Route::delete('cardetail/{car}', [CarDetailsController::class, 'destroy']);
    
    Route::get('carissue/{car}', [CarIssueController::class, 'index']);
    Route::post('carissue/{car}', [CarIssueController::class, 'store']);
     Route::put('carissue/{carIssue}', [CarIssueController::class, 'update']);
    
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum');
