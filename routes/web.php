<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocietyController;

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

/* Moderator's Setting Page */
/* Route::get('/setting',function(){
    return view('setting');
}); */
Route::get("/setting",[SocietyController::class,'display']);


/* Moderator's Setting/createSocietyProfile Page */
Route::get('/setting/create_society_profile',function(){
    return view('createSocietyProfile');
});
Route::post('/setting/create_society_profile',[SocietyController::class,'store'])->name('/setting/create_society_profile');

/* Moderator's Setting/updateSocietyProfile Page */
Route::get("setting/updateSociety/{id}",[SocietyController::class,'updateView']);
Route::put('setting/updateSociety/{id}',[SocietyController::class,'update']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
