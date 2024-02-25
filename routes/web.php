<?php

use App\Http\Controllers\Web\Auth\AuthController;
use App\Http\Controllers\Web\Auth\ForgotPasswordController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login',[AuthController::class, 'login'])->name('login.view');
Route::post('/login', [AuthController::class, 'loginUser'])->name('auth.login');
Route::get('/forgot-password', [ForgotPasswordController::class, 'forgotPasswordview'])->name('forgot.view');
Route::post('/forgot-password',[ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forgot.post');
Route::get('/reset-password/{email}/{token}/', [ForgotPasswordController::class, 'resetPasswordView'])->name('reset.view');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.send');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['prefix'  => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('home');
});
