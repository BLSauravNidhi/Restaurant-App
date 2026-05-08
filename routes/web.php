<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManageWorkerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TableController;
use App\Http\Middleware\isLoggedIn;
use Illuminate\Support\Facades\Route;



Route::domain(env('APP_DOMAIN'))->group(function() {
    Route::get('/',[PageController::class, 'HomePage'])->name('HomePage');
    
    Route::get('/table/{id}',[TableController::class, 'GetTableAccess'])->name('GetTable');
    Route::get('/table/{id}/waiting',[TableController::class, 'WaitForApproval'])->name('WaitWhileApproving');
    // polling route for cheking request approval 
    Route::get('/api/request-status/{id}', [TableController::class, 'tableStatus'])->name('tableRequesStatusCheck');

    Route::get('/menu/{tableNum}/{token}', [PageController::class, 'tableMenu'])->name('getMenu');
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

        Route::get('dashboard/table-status', [AdminController::class, 'tableStatus'])->name('TableStatus');
        Route::get('dashboard/table-requests', [AdminController::class, 'tableRequests'])->name('TableRequests');
        
        // Table Requests page
        Route::get('dashboard/table-status/approve/{admin}/{id}/', [AdminController::class , 'tableRequestApproved'])->name('approveTableRequest');
        Route::get('dashboard/table-status/reject/{admin}/{id}', [AdminController::class , 'tableRequestRejected'])->name('rejectTableRequest');

        Route::get('dashboard/table-status/cancel/{adminId}/{reqId}', [AdminController::class, 'cancelTable'])->name('table.cancel');

        Route::get('/logout',[AdminController::class, 'logout'])->name('logout');
    });
});

