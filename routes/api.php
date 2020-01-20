<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [
    'as' => 'api.register',
    'uses' => 'API\RegisterController@register'
]);

Route::post('comment', [
    'as' => 'api.comment',
    'uses' => 'PostCommentController@store'
]);

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('likes',[
    'as' => 'api.likes',
    'uses' => 'LikesController@store'
    ]);

Route::get('getpost',[
    'as' => 'api.getpost',
    'uses' => 'CreatePostController@show'
]);

