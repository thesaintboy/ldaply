<?php

use App\Http\Controllers\CController;
use App\Http\Controllers\UsersController;
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

// Public routes
Route::post('/register', [UsersController::class, 'register']);
Route::post('/login', [UsersController::class, 'login']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [UsersController::class, 'logout']);
    Route::post('/c', [CController::class, 'create']);
    Route::put('/c/{id}', [CController::class, 'update']);
    Route::delete('/c/{id}', [CController::class, 'delete']);
    Route::post('/c/test', [CController::class, 'test']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
