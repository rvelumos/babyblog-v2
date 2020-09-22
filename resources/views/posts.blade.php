@extends('layouts.master')

@section('content')

<div class='content_items'>

@if(isset($search_phrase))

<div class='search mx-5'>
<h2>
{{$count}} zoekresulaten op: {{$search_phrase}}
</h2>
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
<p class="lead">{{$post->body}}</p>

<p class="reactions">
  <a href="{{route('post.show', $post->id)}}">reacties ({{App\Post::commentCounter($post->id)}})</a>
</p>
</div>

<div class="line"></div>

@endforeach

</div>

@endsection
