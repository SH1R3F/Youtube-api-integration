<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\YoutubeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::view('/youtube', 'youtube.index')->name('youtube');
    Route::get('/youtube/playlists', [YoutubeController::class, 'playlists'])->name('youtube.playlists');
    Route::get('/youtube/playlists/{playlist}', [YoutubeController::class, 'playlist'])->name('youtube.playlist');
    Route::get('/youtube/videos', [YoutubeController::class, 'videos'])->name('youtube.videos');
    Route::get('/youtube/videos/{video}', [YoutubeController::class, 'show'])->name('youtube.show');
});


Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect'])->where('provider', 'linkedin|github|google');
Route::get('/auth/{provide}/callback', [SocialiteController::class, 'callback'])->where('provider', 'linkedin|github|google');
