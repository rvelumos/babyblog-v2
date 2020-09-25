@extends('layouts.master')

@section('content')

<div class='content_items'>

@if(isset($search_phrase))

<div class='search my-5 p-3' style='float:left; width:98%'>
<p class='text-success'>
Aantal gevonden zoekresultaten: <b>{{$count}}</b>. Je hebt gezocht op:<b> {{$search_phrase}}</b>
</p>
</div>

@endif

@foreach ($posts as $post)
   <!-- Title -->
   <div class="blog_item p-4 my-3" >
     <div class="content_top">
        <h3 class="content_top_title"><a href="{{route('post.show', $post->id)}}">{{$post->title}}</a></h3>
      </div>

<!-- Author -->
<p class="content_author">
  by
  <a href="#">{{$post->uploader}}</a>
</p>

<!-- Date/Time -->
<p class='content_date'>{{$post->created_at->diffForHumans()}}</p>

<!-- Preview Image -->
<img class="img-fluid rounded" src="{{$post->image_path}}" alt="">

<!-- Post Content -->
<p class='content_body'>{{$post->body}}</p>

<p class="content_reactions mt-3">
  <a href="{{route('post.show', $post->id)}}">reacties ({{App\Post::commentCounter($post->id)}})</a>
</p>
</div>

<div class="line"></div>
@endforeach

</div>

@endsection
