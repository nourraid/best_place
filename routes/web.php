<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\typeController ;
use \App\Http\Controllers\admin\userController;
use \App\Http\Controllers\admin\cityController ;
use \App\Http\Controllers\admin\propertyController ;
use \App\Http\Controllers\admin\ratingController;
use \App\Http\Controllers\admin\reservationController;
use \App\Http\Controllers\frontController ;
use \App\Http\Controllers\admin\AdminController ;
use \App\Http\Controllers\admin\DashController ;

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


//
//Route::get('/login', [frontController::class, 'login'])->name('login');
//Route::get('/register', [frontController::class, 'register'])->name('register');
//Route::post('/do_register', [frontController::class, 'do_register'])->name('do_register');


Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::post('/authenticate', [AdminController::class, 'authenticate'])->name('authenticate');

Route::get('/user_logout', [frontController::class, 'user_logout'])->name('user_logout');
Route::post('/user_authenticate', [frontController::class, 'user_authenticate'])->name('user_authenticate');
Route::get('/', [frontController::class, 'user_login'])->name('user_login');

Route::post('/register', [userController::class, 'user_register'])->name('user_register');
Route::get('/register', [userController::class, 'register'])->name('register');





Route::prefix('user')->middleware('auth:web')->group(function () {
    Route::get('/', [frontController::class, 'home'])->name('home');
    Route::get('/about', [frontController::class, 'aboutUs'])->name('about');
    Route::get('/contact', [frontController::class, 'contactUs'])->name('contact');
    Route::post('/send_question', [frontController::class, 'send_question'])->name('send_question');
    Route::get('/type_Properties/{id}', [frontController::class, 'typeProperties'])->name('typeProperties');
    Route::get('/properties', [frontController::class, 'showAllProperties'])->name('properties');
    Route::get('/property_details/{id}', [frontController::class, 'show_property_details'])->name('property_details');
    Route::post('/add_fav', [frontController::class, 'add_fav'])->name('add_fav');
    Route::post('/reserve', [frontController::class, 'reserve'])->name('reserve');
    Route::get('/profile', [frontController::class, 'profile'])->name('profile');
    Route::get('/add_property', [frontController::class, 'add_property'])->name('add_property');
    Route::post('/do_add_property', [frontController::class, 'do_add_property'])->name('do_add_property');

    Route::get('/user/{id}/change', [frontController::class, 'user_change'])->name('user.change');
    Route::put('/user/{id}/reset/do_change', [frontController::class, 'user_do_change'])->name('user.do_change');

    Route::get('/user/{id}/reset', [frontController::class, 'user_reset'])->name('user.reset');
    Route::put('/user/{id}/reset/do_reset', [frontController::class, 'user_do_reset'])->name('user.do_reset');

    Route::resource('/property', propertyController::class);

    Route::get('/search', [frontController::class, 'search'])->name('search');
    Route::post('/search', [frontController::class, 'do_search'])->name('do_search');
    Route::get('/property_reservations/{id}', [frontController::class, 'property_reservations'])->name('property_reservations');
    Route::put('/accept/{id}', [frontController::class, 'accept'])->name('accept');
    Route::put('/reject/{id}', [frontController::class, 'reject'])->name('reject');
    Route::post('/delete_fav', [frontController::class, 'delete_fav'])->name('delete_fav');
    Route::post('/delete_my_property', [frontController::class, 'delete_my_property'])->name('delete_my_property');
    Route::post('/delete_my_request', [frontController::class, 'delete_my_request'])->name('delete_my_request');


});

Route::prefix('admin')->middleware('auth:webadmin')->group(function () {
    Route::get('/', [DashController::class, 'showindex'])->name('dashboard');
    Route::resource('/type', typeController::class);
    Route::resource('/user', userController::class);
    Route::resource('/city', cityController::class);
    Route::resource('/property', propertyController::class);
    Route::resource('/rating', ratingController::class);
    Route::resource('/reservation', reservationController::class);

    Route::get('/admin/{id}/reset', [AdminController::class, 'reset'])->name('admin.reset');
    Route::put('/admin/{id}/reset/do_reset', [AdminController::class, 'do_reset'])->name('admin.do_reset');
    Route::resource('/admin', AdminController::class);

});

//
//Route::prefix('admin')->group(function () {
//    Route::resource('/type', typeController::class);
//    Route::resource('/user', userController::class);
//    Route::resource('/city', cityController::class);
//    Route::resource('/property', propertyController::class);
//    Route::resource('/rating', ratingController::class);
//    Route::resource('/reservation', reservationController::class);
//});
//
//Route::prefix('user')->group(function () {
//    Route::get('/home', [frontController::class, 'home'])->name('home');
//    Route::get('/about', [frontController::class, 'aboutUs'])->name('about');
//    Route::get('/contact', [frontController::class, 'contactUs'])->name('contact');
//    Route::post('/send_question', [frontController::class, 'send_question'])->name('send_question');
//    Route::get('/type_Properties/{id}', [frontController::class, 'typeProperties'])->name('typeProperties');
//    Route::get('/properties', [frontController::class, 'showAllProperties'])->name('properties');
//    Route::get('/property_details/{id}', [frontController::class, 'show_property_details'])->name('property_details');
//    Route::post('/add_fav', [frontController::class, 'add_fav'])->name('add_fav');
//    Route::post('/reserve', [frontController::class, 'reserve'])->name('reserve');
//    Route::get('/profile', [frontController::class, 'profile'])->name('profile');
//});






