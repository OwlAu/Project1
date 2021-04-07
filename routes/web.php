<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\SocietyMemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventParticipantController;
use App\Http\Controllers\ForumPostController;
use App\Http\Controllers\ConfessionController;
use App\Http\Controllers\EventFeedbackController;
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

/* Confession Page */
Route::get('/confession', [ConfessionController::class,'index']);
Route::post('/create_confession', [ConfessionController::class,'store']);

/* Society Page */
Route::get("society",[SocietyController::class,'userviewSocietyPage']);
Route::get("/society/{id}",[SocietyController::class,'userviewSocietyDetailPage']);


/* Event Page */
Route::get("/event",[EventController::class,'userviewEventPage']);
Route::get("/events/{id}",[EventController::class,'userviewEventDetailPage']);


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

/* Moderator's Pending|MyMember Member List */
Route::get('/pending_member_list',[SocietyMemberController::class,'displayPendingUser']);
Route::get('/member_list',[SocietyMemberController::class,'displayMembers']);

/* User join a society */
Route::get('/society/{id}/register_society',[SocietyMemberController::class,'index']);
Route::post('/society/{id}/register_society',[SocietyMemberController::class,'store'])->name('/society/{id}/register_society');

//Accept & Deny & Kick out user registration
Route::put('/accept_user_request/{id}',[SocietyMemberController::class,'acceptSocietyRequest']);
Route::put('/deny_user_request/{id}',[SocietyMemberController::class,'denySocietyRequest']);
Route::put('/kick_member/{id}',[SocietyMemberController::class,'kickSocietyRequest']);

//Society's announcements
Route::post('/society/{id}/announcements',[AnnouncementController::class,'index']);

//Society's events & event's details
Route::post('/society/{id}/events',[EventController::class,'displaySocietyEvent']);
Route::post('/society/{id}/events/{name}',[EventController::class,'displaySocietyEventDetail']);
Route::post('/society/{id}/events/{name}/register',[EventParticipantController::class,'eventRegistrationForm']);
Route::post('/society/{id}/events/{name}/registerUser',[EventParticipantController::class,'store']);

//Society's forum
Route::get('/create_society_forum',[ForumPostController::class,'createForumForm']);
Route::get('/society_forum_list',[ForumPostController::class,'societyForumList']);
Route::post('/create_society_forum',[ForumPostController::class,'store']);
Route::post('/society/{id}/memories',[ForumPostController::class,'index']);
Route::get('/update_forum/{id}',[ForumPostController::class,'updateForumForm']);
Route::put('/update_forum/{id}',[ForumPostController::class,'update']);
Route::get('/delete_forum/{id}',[ForumPostController::class,'destroy']);

//Society's feedback
Route::post('/create_feedback',[EventFeedbackController::class,'store']);
//This is the page where we first click in
Route::get('/event_feedback',[EventFeedbackController::class,'index']);
Route::get('/event_feedback/{id}',[EventFeedbackController::class,'show']);
Route::get('/event_feedback/{id}/participants',[EventParticipantController::class,'displayParticipants']);
Route::get('/event_feedback/{eventId}/participants/{eventParticipantId}/accept_registration',[EventParticipantController::class,'acceptRegistration']);
Route::get('/event_feedback/{id}/feedbacks',[EventFeedbackController::class,'displayFeedbacks']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


