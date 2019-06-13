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

Route::get('/', function () {
    return view('Auth.login');
});
Auth::routes();
//login
Route::post('/user/login', 'User\UserController@login');
Route::get('/user/logout','User\UserController@logout');

Route::group(['middleware' => ['auth']], function () {
    //post list
    Route::get('/posts', 'Post\PostController@index');
    //post create
    Route::get('/post/create', 'Post\PostController@showRegisterForm');
    Route::put('/post/create', 'Post\PostController@create');
    Route::post('/post/create', 'Post\PostController@store');
    //post update
    Route::get('/post/{id}', 'Post\PostController@edit');
    Route::put('/post/{id}', 'Post\PostController@editConfirm');
    Route::post('/post/{id}', 'Post\PostController@update');
    //posts search
    Route::get('/posts/search', 'Post\PostController@search');
    //post detail show
    Route::get('/post/show/{id}', 'Post\PostController@show');
    //post delete
    Route::delete('/post', 'Post\PostController@destroy');
    //export excel
    Route::get('/download', 'Post\PostController@export');
    //import csv file
    Route::get('/csv/upload', 'Post\PostController@showUploadForm');
    Route::post('/csv/upload', 'Post\PostController@import');

    //user list
    Route::get('/users', 'User\UserController@index');
    //user create
    Route::get('/user/create', 'User\UserController@showRegisterForm');
    Route::put('/user/create', 'User\UserController@create');
    Route::post('/user/create', 'User\UserController@store');
    //user search
    Route::get('/user/search', 'User\UserController@search');
    //user update
    Route::get('/user/{id}', 'User\UserController@edit');
    Route::put('/user/{id}', 'User\UserController@editConfirm');
    Route::post('/user/{id}', 'User\UserController@update');
    //change Password
    Route::get('/changePwd/{id}', 'User\UserController@showPwdForm');
    Route::Post('/changePwd/{id}', 'User\UserController@changePassword');
    //user profile
    Route::get('/user/profile/{id}', 'User\UserController@showProfile');
    //user delete
    Route::delete('/user', 'User\UserController@destroy');
});

