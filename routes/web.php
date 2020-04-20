<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


// GET
Route::get('/home', 'PostController@index')->name('home');
Route::get('/auth/account', 'AccountController@show')->middleware('auth')->name('account');
Route::get('/account/{id}', 'AccountController@destroy')->middleware('auth')->name('account.destroy');
Route::get('/profil/{slug}', 'ProfilController@index')->name('profil');
Route::get('/home/{id}', 'PostController@destroy')->middleware('auth')->name('destroy.post');
Route::get('/profil/{slug}/amis_add', 'ProfilController@amis_add')->name('profil.amisAdd');
Route::get('/profil/{slug}/amis_invit', 'ProfilController@amis_invit')->name('profil.amisInvit');
Route::get('/profil/{slug}/amis_delete', 'ProfilController@amis_delete')->name('profil.amisDelete');
Route::get('/home/{id}/like', 'PostController@like')->name('post.like');
Route::get('/home/{id}/unlike', 'PostController@unlike')->name('post.unlike');
Route::get('/com/{id}', 'ComController@destroyCom')->middleware('auth')->name('destroyCom.com');
Route::get('/search', 'SearchController@index')->name('search');


// POST
Route::post('account/{id}', 'AccountController@update')->middleware('auth')->name('account.update');
Route::post('/account', 'AccountController@destroyAvatar')->middleware('auth')->name('account.destroyAvatar');
Route::post('profil/{slug}', 'ProfilController@updateAvatar')->middleware('auth')->name('profil.updateAvatar');
Route::post('profil', 'ProfilController@updateCover')->middleware('auth')->name('profil.updateCover');
Route::post('/home', 'PostController@create')->middleware('auth')->name('create.post');
Route::post('/', 'ComController@createCom')->middleware('auth')->name('createCom.com');