<?php

//photo album
Route::get('/fotoalbum', 'PhotoalbumController@index')->name('photoalbum.index');
Route::group(['middleware' => ['web']], function () {
    Route::get('/fotoalbum/{album_id}', 'PhotoalbumController@show')->name('photoalbum.show');    
    Route::put('/fotoalbum/{album_id}', 'commentController@store')->name('comment.insert');
    Route::get('/fotoalbum/{album_id}/foto/{photo_id}', 'PhotoalbumphotosController@show')->name('photoalbumphotos.show');
});

?>