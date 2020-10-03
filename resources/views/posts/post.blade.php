@extends('layouts.master')

@section('content')

   <!-- Title -->
   <div class="blog_item_details p-4 my-3" >
     <div class="content_top">
        <h1 class="content_top_title">{{$post->title}}</h1>

<!-- Author -->
<p class="content_author">
  by
  <a href="#">{{$post->uploader}}</a>
</p>

<hr>

<!-- Date/Time -->
<p class='content_date'>{{$post->created_at->diffForHumans()}}</p>

<hr>

<!-- Preview Image -->
<img class="content_image" src="{{$post->image_path}}" alt="" />

<!-- Post Content -->
<p class="content_body">{{$post->body}}</p>

<hr style='border-top: 2px dashed #efefef' class='mt-5' />

<!-- reactions -->

<div class="reactions">

</div>

<h2 class="content_top_title">Reageren</h2>

<!-- reaction form -->

@if(Session::has('stored_message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('stored_message') }}</p>
@endif

<div class="content_reactions mt-3">
<div class="form_reactions_container p-4 my-4">

    @if(count($errors) > 0)

    <div class="alert alert-danger">

    <ul>
    @foreach($errors->all() as $error)
      <li>
        {{$error}}
      </li>
    @endforeach


    </ul>

    </div>
    @endif

    {!! Form::open(['method'=>'PUT', 'route'=> array('post.show', $post->id)]) !!}
    
    {{ csrf_field() }}
    
    {{ Form::hidden('post_id', $post->id) }}
    {{ Form::hidden('section', "blog") }}
           <div class='form-group mt-2'>                
                {!! Form::label('name','Naam') !!}                
            </div>          
            <div class='form-group'>                
            {!! Form::text('name', null, ['class'=>'field']) !!}                                  
            </div>

            <div class='form-group mt-2'>                
            {!! Form::label('message','Bericht') !!}            
            </div>                
            <div class='form-group'>                
            {!! Form::textarea('message', null, ['class'=>'textarea']) !!}                                  
            </div>                

            <div class='form-group mt-2'>                
                {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}            
            </div>

    {!! Form::close() !!}
  </div>
</div>

{{App\Post::getComments($post->id, 'post_id')}}

@endsection
