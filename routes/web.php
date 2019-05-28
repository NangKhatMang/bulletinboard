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

Route::post('/user/login', 'User\UserController@login');
Route::get('/user/logout','User\UserController@logout');

/* post */
Route::get('/postAdd', function () {
    return view('Post.create');
});
Route::get('/postConfirm', function () {
    return view('Post.createConfirm');
});
Route::get('/postEdit', function () {
    return view('Post.edit');
});
Route::get('/postList', function () {
    return view('Post.postList');
});
Route::get('/postEditConfirm', function () {
    return view('Post.editConfirm');
});
Route::get('/upload', function () {
    return view('Post.upload');
});

/* user */
Route::get('/userList', function () {
    return view('User.userList');
});
Route::get('/userAdd', function () {
    return view('User.create');
});
Route::get('/userConfirm', function () {
    return view('User.createConfirm');
});
Route::get('/userEdit', function () {
    return view('User.edit');
});
Route::get('/userEditConfirm', function () {
    return view('User.editConfirm');
});

Route::get('/changePassword', function () {
    return view('User.changePassword');
});
Route::get('/userProfile', function () {
    return view('User.userProfile');
});