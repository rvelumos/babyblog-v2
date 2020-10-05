<div class="menu_content" id='navigation'>
    <p class="menu_link"><a href="{{route('post.index')}}" >Blog</a></p>
    @guest
        <p class="menu_link"><a href="{{route('admin.showLogin')}}">Admin</a></p>
    @else
        <p class="menu_link"><a href="{{route('admin.index')}}">Admin</a></p>
    @endguest
    <p class="menu_link"><a href="{{route('photoalbum.index')}}" >Fotoalbum</a></p>
    
    <div class="form_container mr-4">
    {!! Form::open(['method'=>'PUT', 'action'=> 'PostController@search']) !!}
    
    {{ csrf_field() }}
    
           <div class='form-group pt-3'>                
                {!! Form::text('search_field', null, ['class'=>'field', 'value'=>'Zoeken in blog']) !!}  
                {!! Form::submit('Zoeken', ['class'=>'btn btn-primary']) !!}            
            </div>                


    {!! Form::close() !!}
    </div>
</div>
            
