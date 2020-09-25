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

Auth::routes();

Route::get('/', 'PostController@index')->name('post.index');
Route::get('/post/zoek', 'PostController@search')->name('posts.search');
Route::put('/post/zoek', 'PostController@search')->name('posts.search');
Route::get('/post/{id}', 'PostController@show')->name('post.show');
Route::put('/post/{id}', 'commentController@store')->name('comment.insert');

//Route::get('/post/{id}/', 'commentController@store')->name('comment.insert');

//photo album
Route::get('/fotoalbum/', 'PhotoalbumController@index')->name('photoalbum.index');
//Route::get('/fotoalbum/{album_id}', 'PhotoalbumController@index')->name('photoalbum.index');
//Route::get('/fotoalbum/{album_id}/{photo_id}', 'PhotoalbumController@index')->name('photoalbum.photo.index');

// admin section
Route::get('/admin', 'AdminController@index')->name('admin.index');

Route::middleware('auth')->group(function(){
  Route::get('/admin/posts', 'AdminController@index')->name('admin.posts.index');
  Route::get('/admin/posts/edit/{post}', 'AdminController@update')->name('admin.posts.edit');
  Route::get('/admin/posts/delete/{post}', 'AdminController@destroy')->name('admin.posts.delete');
  Route::get('/admin/posts/insert', 'AdminController@create')->name('admin.posts.add');

  Route::get('/admin/categories', 'AdminController@index')->name('admin.category.index');
  Route::get('/admin/categories/edit/{post}', 'AdminController@update')->name('admin.category.edit');
  Route::get('/admin/categories/delete/{post}', 'AdminController@destroy')->name('admin.category.delete');
  Route::get('/admin/categories/insert', 'AdminController@create')->name('admin.category.add');

  //Route::get('/admin/tags', 'AdminController@show')->name('admin.category.show');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
