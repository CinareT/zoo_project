<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);

Route::group([ 'prefix' => '/control'], function () {
    Route::get('', [DashboardController::class, 'index'])->name('admin.index');
});