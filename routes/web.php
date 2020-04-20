<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

// GET
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/auth/account', 'AccountController@show')->middleware('auth')->name('account');
Route::get('/account/{id}', 'AccountController@destroy')->middleware('auth')->name('account.destroy');

// POST
Route::post('account/{id}', 'AccountController@update')->middleware('auth')->name('account.update');
Route::post('/account', 'AccountController@destroyAvatar')->middleware('auth')->name('account.destroyAvatar');