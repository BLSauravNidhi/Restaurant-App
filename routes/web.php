<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManageWorkerController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isLoggedIn;
use Illuminate\Support\Facades\Route;



Route::domain(env('APP_DOMAIN'))->group(function() {
    Route::get('/',[UserController::class, 'HomePage'])->name('HomePage');
    Route::get('/table/{id}',[TableController::class, 'GetTableAccess'])->name('GetTable');
});

// Admins Routes 
Route::domain('admin.' . env('APP_DOMAIN'))->group(function() {
    Route::get('/',[AdminController::class, 'AdminLogin'])->name('AdminLogin');
    Route::post('/authenticating', [AdminController::class, 'authenticateAdmin'])->name('authenticateAdmin');

    Route::middleware(isLoggedIn::class)->group(function(){
        Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('AdminDashboard');
        
        Route::middleware('role:administrator')->group(function(){
            Route::get('/dashboard/analytics',[AdminController::class, 'analytics'])->name('AdminAnalytics');
            // manage workers 
            Route::resource('dashboard/manage-worker', ManageWorkerController::class)->only([
                'index','store','update','destroy','edit'
            ]);
        });

        Route::get('/logout',[AdminController::class, 'logout'])->name('logout');
    });
});

