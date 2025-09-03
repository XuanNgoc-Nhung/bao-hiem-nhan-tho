<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CccdController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('chon-dang-ky',[UserController::class, 'chonDangKy'])->name('chon-dang-ky');

Route::get('check-cccd',[UserController::class, 'checkCccd'])->name('user.check-cccd');
Route::get('register',[UserController::class, 'register'])->name('user.register');
Route::post('verify-cccd',[UserController::class, 'verifyCccd'])->name('user.verify-cccd');
// Admin
Route::get('admin/dang-nhap', [AdminController::class, 'dangNhap'])->name('admin.dang-nhap');
Route::post('admin/login', [AdminController::class, 'dangNhapAdmin'])->name('admin.login');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::group(['prefix' => 'admin','middleware' => 'CheckAdmin'], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.dashboard');
    Route::get('/companies', [AdminController::class, 'companies'])->name('admin.companies');
    Route::get('/user', function () {
        return view('admin.users');
    })->name('admin.users');
    // CCCD
    Route::get('/cccd', [CccdController::class, 'index'])->name('admin.cccd');
    Route::post('/cccd', [CccdController::class, 'store'])->name('admin.cccd.store');
    Route::put('/cccd/{id}', [CccdController::class, 'update'])->name('admin.cccd.update');
    Route::delete('/cccd/{id}', [CccdController::class, 'destroy'])->name('admin.cccd.delete');
    // Companies
    Route::post('/companies/store', [AdminController::class, 'storeCompany'])->name('admin.companies.store');
    Route::put('/companies/{id}', [AdminController::class, 'updateCompany'])->name('admin.companies.update');
    Route::delete('/companies/{id}', [AdminController::class, 'deleteCompany'])->name('admin.companies.delete');
    // Policies
    Route::get('/policies', [PolicyController::class, 'index'])->name('admin.policies');
    Route::post('/policies', [PolicyController::class, 'store'])->name('admin.policies.store');
    Route::put('/policies/{id}', [PolicyController::class, 'update'])->name('admin.policies.update');
    Route::delete('/policies/{id}', [PolicyController::class, 'destroy'])->name('admin.policies.delete');
    // Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('admin.reports');
    Route::post('/reports', [ReportController::class, 'store'])->name('admin.reports.store');
    Route::put('/reports/{id}', [ReportController::class, 'update'])->name('admin.reports.update');
    Route::delete('/reports/{id}', [ReportController::class, 'destroy'])->name('admin.reports.delete');
    Route::get('reports', function () {})->name('admin.reports');
    Route::get('settings', function () {})->name('admin.settings');
    Route::post('logout', function () {})->name('logout');
});
