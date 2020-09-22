@extends('layouts.master')

@section('content')

   <!-- Title -->
   <h1 class="mt-4">{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
  by
  <a href="#">{{$post->uploader}}</a>
</p>

<hr>

<!-- Date/Time -->
<p>{{$post->created_at->diffForHumans()}}</p>

<hr>

<!-- Preview Image -->
<img class="img-fluid rounded" src="{{$post->image_path}}" alt="">

<!-- Post Content -->
<p class="lead">{{$post->body}}</p>


@endsection
