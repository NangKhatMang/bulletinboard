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