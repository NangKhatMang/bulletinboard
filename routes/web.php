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
    return view('User.login');
});
Route::get('/addPost', function () {
    return view('Post.create');
});
Route::get('/confirmPost', function () {
    return view('Post.createConfirm');
});
Route::get('/edit', function () {
    return view('Post.edit');
});
