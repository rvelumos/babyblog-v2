@extends('layouts.master')

@section('content')

<div class='content_items'>

@if(isset($search_phrase))

<div class='search my-5 p-3 bg-light' style='float:left; width:98%'>
<h5>
Aantal gevonden zoekresultaten: <b>{{$count}}</b>. Je hebt gezocht op:<b> {{$search_phrase}}</b>
</h5>
</div>

@endif

@foreach ($posts as $post)
   <!-- Title -->
   <div class="blog_item">
     <div class="py-3 blog_top">
        <h1 class="my-4 top_title"><a href="{{route('post.show', $post->id)}}">{{$post->title}}</a></h1>
      </div>

<!-- Author -->
<p class="lead">
  by
  <a href="#">{{$post->uploader}}</a>
</p>

<!-- Date/Time -->
<p>{{$post->created_at->diffForHumans()}}</p>

<!-- Preview Image -->
<img class="img-fluid rounded" src="{{$post->image_path}}" alt="">

<!-- Post Content -->
<p>{{$post->body}}</p>

<p class="reactions">
  <a href="{{route('post.show', $post->id)}}">reacties ({{App\Post::commentCounter($post->id)}})</a>
</p>
</div>

<div class="line"></div>

@endforeach

</div>

@endsection
