<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SetController;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user/{user_id}/sets', [SetController::class, 'index']);
    Route::get('/set', [SetController::class, 'show']);
    Route::post('/create', [SetController::class, 'store']);
    Route::patch('/edit/set/{id}', [SetController::class, 'update']);
    Route::delete('/delete/set/{id}', [SetController::class, 'destroy']);
});