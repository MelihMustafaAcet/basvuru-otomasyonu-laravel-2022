<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\HomepageController;
use App\Http\Controllers\User\Applications\capApplicationController;
use App\Http\Controllers\User\Applications\applicationsController;
use App\Http\Controllers\User\Applications\yazApplicationController;
use App\Http\Controllers\Admin\AuthController as AdminAuth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\UserController;

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

Route::get('/', [AuthController::class, 'userLogin'])->name('login.page');
Route::get('/register', [AuthController::class, 'userRegister'])->name('register.page');
Route::post('/register', [AuthController::class, 'userRegisterAction'])->name('register.action');
Route::post('/login', [AuthController::class, 'loginAction'])->name('login.action');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgotmypassword', [AuthController::class, 'forgotMyPassword'])->name('forgot.my.password');
Route::post('/forgotmypassword', [AuthController::class, 'generateResetCode'])->name('generate.reset.code');

Route::name('student.')->prefix('student')->middleware('is.login')->group(function () {
    Route::get('/home', [HomepageController::class, 'index'])->name('homepage');
    Route::get('/application/cap', [capApplicationController::class, 'applicationForm'])->name('cap.application');
    Route::post('/application/cap', [capApplicationController::class, 'applicationAction'])->name('cap.application.action');
    Route::get(
        '/application/cap/view/{studentId}/{applicationId}',
        [capApplicationController::class, 'applicationPreview']
    )->name('cap.application.preview');
    Route::get('/myapplications', [applicationsController::class, 'applications'])->name('my.applications');
    Route::get('/upload/cap/file/{studentId}/{applicationId}', [capApplicationController::class, 'uploadFilePage'])->name('cap.upload');
    Route::post('/upload/cap/file/{studentId}/{applicationId}', [capApplicationController::class, 'uploadFile'])->name('cap.upload.action');

    Route::get('/application/yaz', [yazApplicationController::class, 'applicationForm'])->name('yaz.application');
    Route::post('/application/yaz', [yazApplicationController::class, 'applicationAction'])->name('yaz.application.action');
    Route::get(
        '/application/yaz/view/{studentId}/{applicationId}',
        [yazApplicationController::class, 'applicationPreview']
    )->name('yaz.application.preview');
    Route::get('/upload/yaz/file/{studentId}/{applicationId}', [yazApplicationController::class, 'uploadFilePage'])->name('yaz.upload');
    Route::post('/upload/yaz/file/{studentId}/{applicationId}', [yazApplicationController::class, 'uploadFile'])->name('yaz.upload.action');
});

Route::name('panel.')->prefix('panel')->middleware('is.admin')->group(function () {
    Route::get('/', [AdminAuth::class, 'adminLogin'])->name('login.page')->withoutMiddleware('is.admin');
    Route::post('/', [AdminAuth::class, 'adminLoginAction'])->name('login.action')->withoutMiddleware('is.admin');
    Route::get('/logout', [AdminAuth::class, 'adminLogout'])->name('logout');
    Route::get('/home', [DashboardController::class, 'dashboard'])->name('home');
    Route::get('/awaitingapplications', [ApplicationController::class, 'awaitingApplications'])->name('awaiting');
    Route::get(
        '/application/{type}/{studentId}/{applicationId}/{status?}',
        [ApplicationController::class, 'applicationUpdate']
    )->name('application.update');
    Route::get('/allapplications', [ApplicationController::class, 'allApplications'])->name('all.applications');
    Route::get('/users', [UserController::class, 'users'])->name('all.users');
    Route::get('/user/{id}', [UserController::class, 'userDetail'])->name('user');
});
