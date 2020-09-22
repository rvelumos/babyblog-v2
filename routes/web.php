<?php

use Illuminate\Support\Facades\Route;

use App\Post;
use App\Photoalbum;

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
  //  return view('welcome');
//});

Route::get('/', 'PostController@index')->name('post.index');
Route::get('/post/{id}', 'PostController@show')->name('post.show');

//photo album
Route::get('/fotoalbum/', 'PhotoalbumController@index')->name('photoalbum.index');

// admin section
Route::get('/admin', 'AdminController@index')->name('admin.index');
