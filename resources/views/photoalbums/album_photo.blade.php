@extends('layouts.master')

@section('content')

   <!-- Title -->
   <div class="album_item_details p-4 my-3" >
     <div class="album_top">
        <h1 class="album_top_title">{{$album->name}}</h1>

<p class="album_body">{{$album->description}}</p>


<hr />

<!-- Preview Image -->
<img class="album_image" src="{{$album->image_path}}" alt="" />

<!-- Post Content -->


<hr style='border-top: 2px dashed #efefef' class='mt-5' />

<!-- reactions -->

<div class="reactions">

</div>

<h2 class="album_top_title">Reageren</h2>

<!-- reaction form -->

@if(Session::has('stored_message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('stored_message') }}</p>
@endif

<div class="album_reactions mt-3">  
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

    {!! Form::open(['method'=>'PUT', 'route'=> array('photoalbum.show', $album->id)]) !!}
    
    {{ csrf_field() }}
    
    {{ Form::hidden('album_id', $album->id) }}
    {{ Form::hidden('section', "album") }}
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

{{App\Post::getComments($album->id, 'album_id')}}

@endsection
