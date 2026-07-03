<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ManageWorkerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TableController;
use App\Http\Middleware\isLoggedIn;
use Illuminate\Support\Facades\Route;

// 1. MAIN APP DOMAIN (Uses config() instead of env() to support caching)
Route::domain(config('app.domain'))->group(function() {
    Route::get('/', [PageController::class, 'HomePage'])->name('HomePage');
    
    // Table Management
    Route::prefix('table')->group(function() {
        Route::get('/{id}', [TableController::class, 'GetTableAccess'])->name('GetTable');
        Route::get('/{id}/waiting', [TableController::class, 'WaitForApproval'])->name('WaitWhileApproving');
        Route::get('/{tableNum}/verify', [PageController::class, 'verifyTablePage'])->name('verifyTablePage');
        Route::post('/verify', [TableController::class, 'verifyTable'])->name('verifyTable');
    });

    // API Polling
    Route::get('/api/request-status/{id}', [TableController::class, 'tableStatus'])->name('tableRequesStatusCheck');

    // Menu & Cart
    Route::middleware(['validate.table'])->group(function() {
        Route::prefix('/{tableNum}/{token}')->group(function(){
            Route::get('/menu', [PageController::class, 'tableMenu'])->name('getMenu');
            Route::resource('/cart', CartController::class); 
            Route::get('/orders',[PageController::class, 'getOrdersPage'])->name('ordersPage');
            Route::get('/order/{id}/details',[PageController::class, 'getOrderInfo'])->name('ordersInfo');
        });
    });
});


// 2. ADMIN SUBDOMAIN
Route::domain('admin.' . config('app.domain'))->group(function() {
    
    // Guest Admin Routes
    Route::get('/', [AdminController::class, 'AdminLogin'])->name('AdminLogin');
    Route::post('/authenticating', [AdminController::class, 'authenticateAdmin'])->name('authenticateAdmin');

    // Protected Admin Routes
    Route::middleware(isLoggedIn::class)->group(function() {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('AdminDashboard');
        
        // Table Statuses & Actions
        Route::prefix('dashboard/table-status')->group(function() {
            Route::get('/', [AdminController::class, 'tableStatus'])->name('TableStatus');
            Route::get('/approve/{admin}/{id}', [AdminController::class , 'tableRequestApproved'])->name('approveTableRequest');
            Route::get('/reject/{admin}/{id}', [AdminController::class , 'tableRequestRejected'])->name('rejectTableRequest');
            Route::get('/cancel/{adminId}/{reqId}', [AdminController::class, 'cancelTable'])->name('table.cancel');
        });
        
        Route::get('dashboard/table-requests', [AdminController::class, 'tableRequests'])->name('TableRequests');

        // Role-Restricted Management
        Route::middleware('role:administrator')->prefix('dashboard')->group(function() {
            Route::get('/analytics', [AdminController::class, 'analytics'])->name('AdminAnalytics');
            Route::resource('manage-worker', ManageWorkerController::class)->only([
                'index', 'store', 'update', 'destroy', 'edit'
            ]);
        });

        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});