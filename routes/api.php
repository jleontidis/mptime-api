<?php

use App\Http\Controllers\BadgesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PointagesController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\TenantsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->group(function() {
    
    Route::resource('/tenants', TenantsController::class)->except('show', 'edit', 'create');
    Route::get('/stats', [StatsController::class, 'getDashboardStats']);
    Route::get('/badges/employees', [BadgesController::class, 'getEmployeesWithNoBadge']);
    Route::resource('/badges', BadgesController::class);
    Route::resource('/employees', EmployeesController::class);
    Route::resource('/pointages', PointagesController::class);
    Route::get('/ancienpointages', [PointagesController::class, 'ancienpointages']);
    Route::get('/downloadtransactions', [PointagesController::class, 'create_transactions_file']);
    Route::get('/historytransactions', [PointagesController::class, 'getDirectoriesAndFiles']);
    Route::get('/downloadhistorytransactions', [PointagesController::class, 'getTransactionFile', 'path' ]);
});
