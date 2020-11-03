@extends('layouts.admin-master')

@section('content')

@if(Session::has('stored_message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }} m-4">{{ Session::get('stored_message') }}</p>
@endif

<a href="{{route('admin.photoalbums.create')}}"><input type='button' class='btn btn-success my-2' value='Foto toevoegen' /></a>

<table class='admin_content_items bg-light'>

@foreach ($photos as $photo)
<tr><td>
        <table>
            <tr>   
                <td class="admin_content_actions px-4 py-3"><a href="{{route('admin.photoalbums.delete', $photo->id)}}"><img src='../images/delete.png' /></a></td>
            </tr>
            
            <tr>        
                <td class="admin_content_image px-4 py-3"><img src="{{$photo->path}}" /></a></td>
            </tr>       
         </table>
</td></tr>
@endforeach

</table>


@endsection