<?php

use App\Http\Controllers\Web\Admin\BirthSpeechController;
use App\Http\Controllers\Web\Admin\CustomerController;
use App\Http\Controllers\Web\Admin\LogController;
use App\Http\Controllers\Web\Admin\ProfileController;
use App\Http\Controllers\Web\Admin\ReportController;
use App\Http\Controllers\Web\Admin\ResponseController;
use App\Http\Controllers\Web\Admin\SecureController;
use App\Http\Controllers\Web\Admin\SettingController;
use App\Http\Controllers\Web\Admin\TelephoneController;
use App\Http\Controllers\Web\Admin\UserController;
use App\Http\Controllers\Web\Auth\AuthController;
use App\Http\Controllers\Web\Auth\ChangePasswordAdmin;
use App\Http\Controllers\Web\Auth\ForgotPasswordController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\EmailVerfiController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\MasterData\BrandController;
use App\Http\Controllers\Web\MasterData\ContactCategoryController;
use App\Http\Controllers\Web\MasterData\SosmedCategoryController;
use App\Http\Controllers\Web\PhotoController;
use App\Http\Controllers\Web\ReviewController;
use App\Http\Controllers\Web\VerifCodeController;
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


Route::get('/verif-code',[VerifCodeController::class, 'verifCodeView'])->name('verif.view');
Route::post('/upload-photo', [PhotoController::class, 'store'])->name('save.store');
Route::get('/code-view', [VerifCodeController::class, 'codeVerif'])->name('code.view');
Route::post('/code-send',[VerifCodeController::class, 'verifyCode'])->name('code.verify');

Route::get('/review/{name}/{kode}', [ReviewController::class, 'index'])->name('review.view');
Route::post('/review-store', [ReviewController::class, 'store'])->name('submit.review');

Route::group(['middleware' => ['auth','checkDistance']], function(){


        Route::get('/', [DashboardController::class, 'index'])->name('home');

        // setting
        Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
        Route::put('/setting/{id}', [SettingController::class, 'update'])->name('setting.update');
        Route::put('/admin-password/{id}', [AuthController::class, 'change_password_admin'])->name('password.change');
        Route::resource('admin-pass', ChangePasswordAdmin::class);

        // contact
        Route::resource('data-contact', ContactCategoryController::class);
        // sosmed category
        Route::resource('data-sosmed', SosmedCategoryController::class);
        // brand
        Route::resource('data-brand', BrandController::class);
        // customer
        Route::resource('data-customer', CustomerController::class);
        // telephone
        Route::resource('data-telepon', TelephoneController::class);
        // laporan
        Route::resource('data-report', ReportController::class);
        // log
        Route::resource('data-log',LogController::class);
        //
        Route::resource('data-response', ResponseController::class);
        //
        Route::resource('data-user', UserController::class);
        // profile
        Route::resource('profile-user', ProfileController::class);
        Route::post('secure-login',[SecureController::class, 'update'])->name('secure.update');
        Route::resource('speech-birthday', BirthSpeechController::class);
});
