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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/dashboard', 'dashboard.index')->name('home');
Route::view('/buy', 'dashboard.buy')->name('buy');
Route::view('/airdrop', 'dashboard.airdrop')->name('airdrop');
Route::view('/nfts', 'dashboard.nfts')->name('nfts');
Route::view('/farm', 'dashboard.farm')->name('farm');
Route::view('/profile', 'dashboard.profile')->name('profile');
