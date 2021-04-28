<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\CheckSession;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index']); 

Route::get('/view/{post}', [HomeController::class, 'showhome']); 

Route::get('image/{type}/{filename}', [UsersController::class, 'displayImage']);

Route::get('/masuk', function () {
    return view('userViews.signin');
});

Route::post('/masuk', [UsersController::class, 'signin']);

Route::get('/profile', function () {
    $user = Auth::user();
    return view('userViews.profile', compact('user'));
})->middleware(CheckSession::class);

Route::get('/profile/ubah', function () {
    $user = Auth::user();
    return view('userViews.update', compact('user'));
})->middleware(CheckSession::class);

Route::put('/profile/ubah', [UsersController::class, 'editProfile'])->middleware(CheckSession::class);

Route::get('/daftar', function () {
    return view('userViews.signup');
});

Route::post('/daftar', [UsersController::class, 'signup']);

Route::get('/keluar', [UsersController::class, 'signout']);

Route::resource('posts', PostController::class)->middleware(CheckSession::class);

