<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LangController;
use App\Http\Controllers\Admin\LanguageLineController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get(LaravelLocalization::setLocale().'/', [HomeController::class, 'index']);

Route::group(['middleware' => 'auth', 'prefix' => LaravelLocalization::setLocale().'/control', 'as' => 'admin.'], function () {
    Route::get('', [DashboardController::class, 'index'])->name('index');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('language_line', LanguageLineController::class);
    Route::resource('langs', LangController::class);
    Route::resource('categories', CategoryController::class);
});


Route::get(LaravelLocalization::setLocale().'/login', [AuthController::class, 'login'])->name('login');
Route::post(LaravelLocalization::setLocale().'/login', [AuthController::class, 'login']);
