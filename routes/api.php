<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\MasterData\BrandListController;
use App\Http\Controllers\API\MasterData\ContactCategoryController;
use App\Http\Controllers\API\MasterData\ReportController;
use App\Http\Controllers\API\MasterData\ReportTypeController;
use App\Http\Controllers\API\MasterData\ResponseController;
use App\Http\Controllers\API\MasterData\SosmedCategoryController;
use App\Http\Controllers\API\Profile\ProfileController;
use App\Http\Controllers\API\Profile\TermController;
use App\Http\Controllers\API\Profile\ThemeController;
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


Route::post('/check-email', [AuthController::class, 'checkEmail']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// term and condition
Route::resource('/term-condition', TermController::class);

// master data
Route::resource('/social-media', SosmedCategoryController::class);
Route::resource('/contact', ContactCategoryController::class);
Route::resource('/brand-list', BrandListController::class);

Route::resource('/theme', ThemeController::class);

Route::resource('/type-report', ReportTypeController::class);


Route::group(['middleware' => 'api'], function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::resource('report', ReportController::class);
    Route::resource('response', ResponseController::class);
    Route::post('change-password/{id}', [AuthController::class, 'change_password']);
    // Route::resource('profile-update', ProfileController::class);
    Route::post('profile-update', [ProfileController::class, 'updateProfile']);
});
