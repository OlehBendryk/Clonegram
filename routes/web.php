<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfilesController;
use App\Mail\NewUserWelcomeMail;
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


Auth::routes();

Route::get('/email', function () {
    return new NewUserWelcomeMail();
});


//Follows
Route::post('/follow/{user}', [FollowController::class, 'store']);
Route::get('/profile/{profile}/followers', [FollowController::class, 'showFollowers'])->name('showFollowers');
Route::get('/profile/{profile}/following', [FollowController::class, 'showFollowing'])->name('showFollowing');

//Profiles
Route::resource('/profile', ProfilesController::class);

//Posts
Route::get('/', [PostsController::class, 'index']);
Route::resource('/post', PostsController::class)->middleware('auth');


