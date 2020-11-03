@extends('layouts.admin-master')

@section('content')

<table class='admin_blog_item_details bg-light'><tr><td>

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

{!! Form::open(['method'=>'PUT', 'route'=> array('admin.photoalbums.create')]) !!}
    
    {{ csrf_field() }}
    

           <div class='form-group mt-2'>                
                {!! Form::label('name', 'Naam') !!}                
            </div>          
            <div class='form-group'>                
            {!! Form::text('name', null, ['class'=>'field']) !!}                                  
            </div>

            <div class='form-group mt-2'>                
                {!! Form::label('description', 'Omschrijving') !!}                
            </div>          
            <div class='form-group'>                
            {!! Form::text('description', null, ['class'=>'field']) !!}                                  
            </div>

            <div class='form-group mt-2'>                
            {!! Form::label('path','Afbeelding') !!}            
            </div>                
            <div class='form-group'>                
            {!! Form::file('path', null,  ['class'=>'textarea']) !!}                                  
            </div>                

            <div class='form-group mt-2'>                
            {!! Form::label('status','Status') !!}            
            </div>  
            <div class='form-group'>
            {!! Form::select('status', array('0' => 'Inactief', '1' => 'Actief')) !!}
            </div>

            <div class='form-group mt-2'>                
                {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}            
            </div>

    {!! Form::close() !!}

</td></tr></table>
@endsection