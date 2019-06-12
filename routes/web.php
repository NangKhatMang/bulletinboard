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
//login
Route::post('/user/login', 'User\UserController@login');
Route::get('/user/logout','User\UserController@logout');
//post list
Route::get('/posts', 'Post\PostController@index');
//post create
Route::get('/post/create', 'Post\PostController@showRegisterForm');
Route::put('/post/create', 'Post\PostController@create');
Route::post('/post/create', 'Post\PostController@store');
//post update
Route::get('/post/{postId}', 'Post\PostController@edit');
Route::put('/post/{postId}', 'Post\PostController@editConfirm');
Route::post('/post/{postId}', 'Post\PostController@update');
//posts search
Route::get('/posts/search', 'Post\PostController@search');
//post detail show
Route::get('/post/show/{postId}', 'Post\PostController@show');
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
Route::get('/user/{userId}', 'User\UserController@edit');
Route::put('/user/{userId}', 'User\UserController@editConfirm');
Route::post('/user/{userId}', 'User\UserController@update');
//change Password
Route::get('/changePwd/{userId}', 'User\UserController@showPwdForm');
Route::Post('/changePwd/{userId}', 'User\UserController@changePassword');
//user profile
Route::get('/user/profile/{userId}', 'User\UserController@showProfile');
//user delete
Route::delete('/user', 'User\UserController@destroy');
