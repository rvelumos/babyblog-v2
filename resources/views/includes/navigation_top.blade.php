<div class="menu_content">
    <p class="menu_link"><a href="{{route('post.index')}}" >Blog</a></p>
    <p class="menu_link"><a href="{{route('admin.index')}}">Admin</a></p>
    <p class="menu_link"><a href="{{route('photoalbum.index')}}" >Fotoalbum</a></p>
    
    {!! Form::open(['method'=>'PUT', 'action'=> 'PostController@search']) !!}
    
    {{ csrf_field() }}
    
           <div class='form-group'>
                {!! Form::label('search_field', 'Zoeken') !!}
                {!! Form::text('search_field', null, ['class'=>'field']) !!}  
                {!! Form::submit('Zoeken', ['class'=>'btn btn-primary']) !!}            
            </div>                


    {!! Form::close() !!}
</div>
            
