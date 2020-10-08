<?php

// admin section
Route::get('/admin', 'AdminController@showLogin')->name('admin.showLogin');
Route::put('/login', 'AdminController@doLogin')->name('admin.doLogin');

Route::middleware('auth')->group(function(){

  Route::get('/admin/index/', 'AdminController@index')->name('admin.index');

  Route::get('/admin/posts', 'AdminController@index')->name('admin.posts.index');
  Route::get('/admin/posts/edit/{post}', 'AdminController@update')->name('admin.posts.edit');
  Route::get('/admin/posts/delete/{post}', 'AdminController@destroy')->name('admin.posts.delete');
  Route::get('/admin/posts/insert', 'AdminController@create')->name('admin.posts.add');

  Route::get('/admin/fotoalbum', 'PhotoController@index')->name('admin.photoalbums.index');
  Route::get('/admin/fotoalbum/edit/{post}', 'PhotoalbumController@update')->name('admin.photoalbums.edit');
  Route::get('/admin/fotoalbum/delete/{post}', 'PhotoalbumController@destroy')->name('admin.photoalbums.delete');
  Route::get('/admin/fotoalbum/insert', 'PhotoalbumController@create')->name('admin.photoalbums.add');

  Route::get('/admin/stats', 'LogController@stats')->name('admin.stats.index');

  Route::get('/admin/logs', 'LogController@index')->name('admin.logs.index');

  Route::get('/admin/settings', 'AdminController@getSettings')->name('admin.settings.index');
  Route::put('/admin/settings', 'AdminController@updateSettings')->name('admin.settings.edit');

  Route::get('/admin/categories', 'AdminController@index')->name('admin.category.index');
  Route::get('/admin/categories/edit/{post}', 'AdminController@update')->name('admin.category.edit');
  Route::get('/admin/categories/delete/{post}', 'AdminController@destroy')->name('admin.category.delete');
  Route::get('/admin/categories/insert', 'AdminController@create')->name('admin.category.add');

  //Route::get('/admin/tags', 'AdminController@show')->name('admin.category.show');
});

?>