<?php
Route::get('/', 'PostController@index')->name('post.index');
Route::get('/post/zoek', 'PostController@search')->name('posts.search');
Route::put('/post/zoek', 'PostController@search')->name('posts.search');

Route::group(['middleware' => ['web']], function () {
    Route::get('/post/{id}', 'PostController@show')->name('post.show');
    Route::put('/post/{id}', 'commentController@store')->name('comment.insert');
});
//Route::get('/post/{id}/', 'commentController@store')->name('comment.insert');

?>