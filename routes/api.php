<?php

use App\Http\Controllers\BadgesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PointagesController;
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
    
    Route::get('/badges', [BadgesController::class, 'index']);
    Route::resource('/employees', EmployeesController::class);
    Route::resource('/pointages', PointagesController::class);
    Route::get('/ancienpointages', [PointagesController::class, 'ancienpointages']);

    
});