<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Profile\ProfileController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:api'])->group(function (){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('change-password/{id}', [AuthController::class, 'change_password']);
    Route::resource('profile-update', ProfileController::class);
});
