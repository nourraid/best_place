<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\typeController ;
use \App\Http\Controllers\admin\userController;
use \App\Http\Controllers\admin\cityController ;
use \App\Http\Controllers\admin\propertyController ;
use \App\Http\Controllers\admin\ratingController;
use \App\Http\Controllers\admin\reservationController;
use \App\Http\Controllers\frontController ;

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
    return view('front_site.layout.master');
});

Route::prefix('admin')->group(function () {
    Route::resource('/type', typeController::class);
    Route::resource('/user', userController::class);
    Route::resource('/city', cityController::class);
    Route::resource('/property', propertyController::class);
    Route::resource('/rating', ratingController::class);
    Route::resource('/reservation', reservationController::class);
});

Route::prefix('user')->group(function () {
    Route::get('/home', [frontController::class, 'home'])->name('home');
    Route::get('/about', [frontController::class, 'aboutUs'])->name('about');
    Route::get('/contact', [frontController::class, 'contactUs'])->name('contact');
    Route::post('/send_question', [frontController::class, 'send_question'])->name('send_question');
    Route::get('/type_Properties/{id}', [frontController::class, 'typeProperties'])->name('typeProperties');
    Route::get('/properties', [frontController::class, 'showAllProperties'])->name('properties');
    Route::get('/property_details/{id}', [frontController::class, 'show_property_details'])->name('property_details');

});
Route::get('/login', [frontController::class, 'login'])->name('login');
Route::get('/register', [frontController::class, 'register'])->name('register');
Route::post('/do_register', [frontController::class, 'do_register'])->name('do_register');





