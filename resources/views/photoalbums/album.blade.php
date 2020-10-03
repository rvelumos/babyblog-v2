@extends('layouts.master')

@section('content')

   <!-- Title -->
   <div class="album_item_details p-4 my-3" >
     <div class="album_top">
        <h1 class="album_top_title">{{$album->name}}</h1>

<p class="album_body">{{$album->description}}</p>


<hr />


{{App\Photoalbum::getPhotos($album->id, 'album_id')}}


@endsection
