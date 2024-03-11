<?php

use App\Http\Controllers\Web\Admin\SettingController;
use App\Http\Controllers\Web\Auth\AuthController;
use App\Http\Controllers\Web\Auth\ForgotPasswordController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\EmailVerfiController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\MasterData\ContactCategoryController;
use App\Http\Controllers\Web\MasterData\SosmedCategoryController;
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
Route::get('/verif-success/{email}',[EmailVerfiController::class,'verifSuccess'])->name('verif.success');
Route::get('/verif-failed',[EmailVerfiController::class,'verifFailed'])->name('verif.failed');
Route::get('/verif-waiting/{email}',[EmailVerfiController::class,'verifWaiting'])->name('verif.waiting');
Route::post('/forgot-password',[ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forgot.post');
Route::post('/resend',[ForgotPasswordController::class, 'resendEmail'])->name('resend');
Route::get('/reset-password/{email}/{token}/', [ForgotPasswordController::class, 'resetPasswordView'])->name('reset.view');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.send');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');


// sosmed category
Route::resource('/category-social-media', SosmedCategoryController::class);

// setting
Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
Route::put('/setting/{id}', [SettingController::class, 'update'])->name('setting.update');

// contact
Route::resource('data-contact', ContactCategoryController::class);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('home');
});
