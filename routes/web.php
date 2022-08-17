<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// view routes
Route::view('/dashboard', 'dashboard.index')->name('home');
Route::view('/buy', 'dashboard.buy')->name('buy');
Route::view('/airdrop', 'dashboard.airdrop')->name('airdrop');
Route::view('/nfts', 'dashboard.nfts')->name('nfts');
Route::view('/farm', 'dashboard.farm')->name('farm');
Route::view('/profile', 'dashboard.profile')->name('profile');


// post, get routes
Route::post('/auth_user', [AppController::class, 'authUser']);
Route::get('/home', [AppController::class, 'getReferrer']);
Route::post('/airdrop', [AppController::class, 'saveAirdropUser']);
Route::get('/check_airdrop/{user_id}', [AppController::class, 'checkAirdropStatus']);

