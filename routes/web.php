<?php

use App\Http\Controllers\Auth\SocialiteController;
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
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/youtube', 'youtube')->name('youtube');
});


Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect'])->where('provider', 'linkedin|github|google');
Route::get('/auth/{provide}/callback', [SocialiteController::class, 'callback'])->where('provider', 'linkedin|github|google');
