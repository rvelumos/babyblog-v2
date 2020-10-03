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
@if($post->image_path != null)
<img class="img-fluid rounded p-3" style="background-color:white; border:1px solid #eee; max-width:300px;" src="{{$post->image_path}}" alt="">
@endif

<!-- Post Content -->
<p class='content_body'>{{Str::limit($post->body, 300)}}</p>

<p class="content_reactions mt-3">
  <a href="{{route('post.show', $post->id)}}">reacties ({{App\Post::commentCounter($post->id)}})</a>
</p>
</div>

<div class="line"></div>

@endforeach

<div class="pagination">
{{ $posts->links() }}
</div>

</div>



@endsection
