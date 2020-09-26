@extends('layouts.master')

@section('content')

<div class='album_items'>

@foreach ($albums as $album)
   <div class='row'>
   <div class="p-4 my-3 col-sm" >
      <a href="{{route('photoalbum.show', $album->id)}}"><div class="album_bg p-3">
        <h3 class="content_top_title">{{$album->name}}</h3>        
      </div></a>

    </div>

    </div>    

@endforeach

</div>

@endsection
