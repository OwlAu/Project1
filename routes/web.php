<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Landing Page */
Route::get('/', function () {
    return view('welcome');
});

/* Profile Page */
Route::get('/profile', function () {
    return view('profile');
});

/* Forum Page */
Route::get('/forum', function () {
    return view('profile');
});

/* Society Page */
Route::get('/society', function () {
    return view('society');
});

/* Event Page */
Route::get('/event', function () {
    return view('event');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
