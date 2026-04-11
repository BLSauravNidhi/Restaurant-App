<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isLoggedIn;



Route::domain(env('APP_DOMAIN'))->group(function() {
    Route::get('/',[UserController::class, 'HomePage'])->name('HomePage');
    Route::get('/table/{id}',[TableController::class, 'scanQR'])->name('ScanTableQR');
});

Route::domain('admin.' . env('APP_DOMAIN'))->group(function() {
    Route::get('/',[AdminController::class, 'AdminLogin'])->name('AdminLogin');
    Route::post('/authenticating', [AdminController::class, 'authenticateAdmin'])->name('authenticateAdmin');

    Route::middleware(isLoggedIn::class)->group(function(){
        Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('AdminDashboard');
        Route::get('/logout',[AdminController::class, 'logout'])->name('logout');
    });

});

