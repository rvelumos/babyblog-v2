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

<table class='admin_photoalbum_details bg-light'><tr><td>

{!! Form::open(['method'=>'PUT', 'route'=> array('admin.photoalbums.update', $photoalbum->id)]) !!}
    
    {{ csrf_field() }}
    
    {{ Form::hidden('post_id', $photoalbum->id) }}    
           <div class='form-group mt-2'>                
                {!! Form::label('name', 'Naam') !!}                
            </div>          
            <div class='form-group'>                
            {!! Form::text('name', $photoalbum->name, ['class'=>'field']) !!}                                  
            </div>

            <div class='form-group mt-2'>                
            {!! Form::label('description','Omschrijving') !!}            
            </div>                
            <div class='form-group'>                
            {!! Form::text('description', $photoalbum->description, ['class'=>'field']) !!}                                  
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