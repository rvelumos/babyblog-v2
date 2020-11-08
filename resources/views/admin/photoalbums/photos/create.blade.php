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

{!! Form::open(['method'=>'PUT', 'route'=> array('admin.photoalbumphotos.create', $id)]) !!}
    
    {{ csrf_field() }}
               
    {{ Form::hidden('album_id', $id) }} 
    
            <div class='form-group mt-2'>                
            {!! Form::label('message','Omschrijving') !!}            
            </div>                
            <div class='form-group'>                
            {!! Form::textarea('description', null,  ['class'=>'textarea']) !!}                                  
            </div>

            <div class='form-group mt-2'>                
            {!! Form::label('image','Afbeelding') !!}            
            </div>                

            <div class='form-group'>                
            {!! Form::file('images[]', null,  ['class'=>'textarea', 'multiple']) !!}                                  
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