<?php

use App\Mail\WelcomeMail;
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

Auth::routes();

Route::get('/email', function(){
    return new WelcomeMail();
});


//treba praviti
Route::get('/users','UsersController@index');


Route::post('/follow/{user}','FollowsController@store');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile');
Route::get('/post/create','PostsController@create');
Route::post('/post','PostsController@store')->middleware('auth');
Route::get('/post/{post}',"PostsController@show")->name('profile.show');
Route::get('/profile/{user}/edit','ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}','ProfilesController@update')->name('profile.update');

Route::get('/home','ProfilesController@home');