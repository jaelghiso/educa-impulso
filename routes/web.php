<?php

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


Auth::routes();

Route::get('/{any}', 'HomeController@index')->where('any', '.*');
Route::get('/news', 'PostController@all');
Route::get('/news/posts/{post}', 'PostController@single');

Route::get('/{post}/comments', 'CommentController@index');
Route::post('/{post}/comments', 'CommentController@store');

Route::get('/admin/{any}', 'AdminPostController@index')->where('any', '.*');
