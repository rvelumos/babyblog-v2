@extends('layouts.admin-master')

@section('content')

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

<table class='admin_blog_item_details bg-light'><tr><td>

{!! Form::open(['method'=>'PUT', 'route'=> array('admin.posts.update', $post->id)]) !!}
    
    {{ csrf_field() }}
    
    {{ Form::hidden('post_id', $post->id) }}    
           <div class='form-group mt-2'>                
                {!! Form::label('title', 'Titel') !!}                
            </div>          
            <div class='form-group'>                
            {!! Form::text('title', $post->title, ['class'=>'field']) !!}                                  
            </div>

            <div class='form-group mt-2'>                
            {!! Form::label('body','Inhoud') !!}            
            </div>                
            <div class='form-group'>                
            {!! Form::textarea('body', $post->body,  ['class'=>'textarea']) !!}                                  
            </div>                

            <div class='form-group mt-2'>                
            {!! Form::label('status','Status') !!}            
            </div>  
            <div class='form-group'>
            {!! Form::select('Status', array('0' => 'Inactief', '1' => 'Actief')) !!}
            </div>

            <div class='form-group mt-2'>                
                {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}            
            </div>

    {!! Form::close() !!}

</td></tr></table>
@endsection