<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
# mengimport controller Covid
use App\Http\Controllers\CovidController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# Route covid
# Method GET
Route::get('/covid', [CovidController::class, 'index']);
Route::get('/covid/{id}', [CovidController::class, 'show']);

# Method POST
Route::post('/covid', [CovidController::class, 'store']);
Route::put('/covid/{id}', [CovidController::class, 'update']);
Route::delete('/covid/{id}', [CovidController::class, 'destroy']);

# untuk register dan login pake auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

#bungkus route dengan middleware sanctum
Route::middleware('auth:sanctum')->group(function () {
    # Method GET, route /covid
    Route::get('/covid', [AuthController::class, 'index']);
    # Create covid
    Route::post('/covid', [AuthController::class, 'store']);
    # Update covid
    Route::put('/covid/{id}', [AuthController::class, 'update']);
    # Delete covid
    Route::delete('/covid/{id}', [AuthController::class, 'destroy']);
});