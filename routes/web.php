<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create', 'CreatePostController@index')->middleware('auth');
Route::get('/', 'CreatePostController@show');
Route::post('/newpost', 'CreatePostController@store')->name('newpost');
Route::get('profile/{id}', 'UserProfilesController@index')->name('profile');
Route::post('likes', 'LikesController@store')->middleware('auth')->name('likes');
Route::post('comment', 'CommentController@store');
Route::get('search', 'UserProfilesController@search')->name('search');
Route::get('singlepost/{id}', "UserProfilesController@singlepost")->name('singlepost');



