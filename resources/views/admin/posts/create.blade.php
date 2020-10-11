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

{!! Form::open(['method'=>'PUT', 'route'=> array('admin.posts.create')]) !!}
    
    {{ csrf_field() }}
    

           <div class='form-group mt-2'>                
                {!! Form::label('title', 'Titel') !!}                
            </div>          
            <div class='form-group'>                
            {!! Form::text('title', null, ['class'=>'field']) !!}                                  
            </div>

            <div class='form-group mt-2'>                
            {!! Form::label('message','Inhoud') !!}            
            </div>                
            <div class='form-group'>                
            {!! Form::textarea('body', null,  ['class'=>'textarea']) !!}                                  
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