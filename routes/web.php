<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\typeController ;
use \App\Http\Controllers\admin\userController;
use \App\Http\Controllers\admin\cityController ;
use \App\Http\Controllers\admin\propertyController ;
use \App\Http\Controllers\admin\ratingController;
use \App\Http\Controllers\admin\reservationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.index');
});

Route::prefix('admin')->group(function () {
    Route::resource('/type', typeController::class);
    Route::resource('/user', userController::class);
    Route::resource('/city', cityController::class);
    Route::resource('/property', propertyController::class);
    Route::resource('/rating', ratingController::class);
    Route::resource('/reservation', reservationController::class);

});


