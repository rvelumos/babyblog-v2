<?php

// admin section
Route::get('/admin', 'AdminController@showLogin')->name('admin.showLogin');
Route::put('/login', 'AdminController@doLogin')->name('admin.doLogin');

Route::middleware('auth')->group(function(){

  /* First page */
  Route::get('/admin/index/', 'AdminController@index')->name('admin.index');

  /* Overview of all blog posts */
  Route::get('/admin/posts', 'AdminController@index')->name('admin.posts.index');
  Route::get('/admin/posts/edit/{post}', 'PostController@edit')->name('admin.posts.edit');
  Route::put('/admin/posts/edit/{post}', 'PostController@update')->name('admin.posts.update');
  Route::get('/admin/posts/delete/{post}', 'PostController@destroy')->name('admin.posts.delete');
  Route::get('/admin/posts/insert', 'PostController@create')->name('admin.posts.create');
  Route::put('/admin/posts/insert', 'PostController@store')->name('admin.posts.store');

  /* The photo album section */
  Route::get('/admin/photoalbum', 'PhotoalbumController@index')->name('admin.photoalbums.index');
  Route::get('/admin/photoalbum/{id}', 'PhotoalbumphotosController@index')->name('admin.photoalbumphotos.index');
  Route::get('/admin/photoalbum/edit/{id}', 'PhotoalbumController@edit')->name('admin.photoalbums.edit');
  Route::put('/admin/photoalbum/edit/{id}', 'PhotoalbumController@update')->name('admin.photoalbums.update');
  Route::get('/admin/photoalbum/delete/{id}', 'PhotoalbumController@destroy')->name('admin.photoalbums.delete');
  Route::get('/admin/photoalbum/insert', 'PhotoalbumController@create')->name('admin.photoalbums.create');
  Route::put('/admin/photoalbum/insert', 'PhotoalbumController@store')->name('admin.photoalbums.store');

  /* Statistics */
  Route::get('/admin/stats', 'LogController@stats')->name('admin.stats.index');

  /* Log page */
  Route::get('/admin/logs', 'LogController@index')->name('admin.logs.index');

  /* Security */
  Route::get('/admin/security', 'AdminController@security')->name('admin.security.index');

  /* Settings for front website */
  Route::get('/admin/settings', 'AdminController@getSettings')->name('admin.settings.index');
  Route::put('/admin/settings', 'AdminController@updateSettings')->name('admin.settings.edit');

  /* Overview of alle coupled categories */
  Route::get('/admin/categories', 'AdminController@index')->name('admin.category.index');
  Route::get('/admin/categories/edit/{post}', 'AdminController@update')->name('admin.category.edit');
  Route::get('/admin/categories/delete/{post}', 'AdminController@destroy')->name('admin.category.delete');
  Route::get('/admin/categories/insert', 'AdminController@create')->name('admin.category.add');

  //Route::get('/admin/tags', 'AdminController@show')->name('admin.category.show');
});

?>