<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\SocietyMemberController;
use App\Http\Controllers\UserController;

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
Route::get('/profile', [UserController::class,'show']);
Route::put('/update_user_profile/{id}',[UserController::class,'update']);

/* Forum Page */
Route::get('/forum', function () {
    return view('profile');
});

/* Society Page */
Route::get("society",[SocietyController::class,'userviewSocietyPage']);
Route::get("/society/{id}",[SocietyController::class,'userviewSocietyDetailPage']);


/* Event Page */
Route::get("/event",[EventController::class,'userviewEventPage']);

/* Moderator's Setting Page */
/* Route::get('/setting',function(){
    return view('setting');
}); */
Route::get("/setting",[SocietyController::class,'show']);


/* Moderator's Setting/createSocietyProfile Page */
Route::get('/setting/create_society_profile',function(){
    return view('createSocietyProfile');
});
Route::post('/setting/create_society_profile',[SocietyController::class,'store'])->name('/setting/create_society_profile');

/* Moderator's Setting/updateSocietyProfile Page */
Route::get("setting/updateSociety/{id}",[SocietyController::class,'updateView']);
Route::put('setting/updateSociety/{id}',[SocietyController::class,'update']);

/* Moderator's Create new Announcement */
Route::get('/create_new_announcement',function(){
    return view('createNewAnnouncement');
});
Route::post('/create_new_announcement',[AnnouncementController::class,'store'])->name('/create_new_announcement');

/* Moderator's Announcement List */
Route::get("/announcement_list",[AnnouncementController::class,'display']);

/* Moderator's Update Announcement Page */
Route::get('/update_announcement/{id}',[AnnouncementController::class,'updateView']);
Route::put('/update_announcement/{id}',[AnnouncementController::class,'update']);

/* Moderator's Delete Announcement List */
Route::get('/delete_announcement/{id}',[AnnouncementController::class,'delete']);

/* Moderator's Create New Event */
Route::get('/create_new_event',function(){
    return view('createNewEvent');
});
Route::post('/create_new_event',[EventController::class,'store'])->name('/create_new_event');

/* Moderator's Event List */
Route::get("/event_list",[EventController::class,'display']);

/* Moderator's Pending Member List */
Route::get('/pending_member_list',[SocietyMemberController::class,'displayPendingUser']);

/* User join a society */
Route::get('/society/{id}/register_society',[SocietyMemberController::class,'index']);
Route::post('/society/{id}/register_society',[SocietyMemberController::class,'store'])->name('/society/{id}/register_society');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


