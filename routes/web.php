<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.dashboard');
    Route::get('/companies', [AdminController::class, 'companies'])->name('admin.companies');
    Route::get('/user', function () {
        return view('admin.users');
    })->name('admin.users');
    Route::post('/companies/store', [AdminController::class, 'storeCompany'])->name('admin.companies.store');
    Route::put('/companies/{id}', [AdminController::class, 'updateCompany'])->name('admin.companies.update');
    Route::delete('/companies/{id}', [AdminController::class, 'deleteCompany'])->name('admin.companies.delete');
    Route::get('policies', function () {})->name('admin.policies');
    Route::get('reports', function () {})->name('admin.reports');
    Route::get('settings', function () {})->name('admin.settings');
    Route::post('logout', function () {})->name('logout');
});
