@extends('layouts.admin-master')

@section('content')

@if(Session::has('stored_message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }} m-4">{{ Session::get('stored_message') }}</p>
@endif

<a href="{{route('admin.photoalbumphotos.create', $id ?? '')}}"><input type='button' class='btn btn-success my-2' value='Foto toevoegen' /></a>

<table class='admin_content_items bg-light'>
<tr>
    <th class="p-4">Voorbeeld</th>
    <th class="p-4">Uploader</th>
    <th class="p-4">Omschrijving</th>
    <th class="p-4">Aantal keer bekeken</th>    
    <th class="p-4">Acties</th>
</tr>
@foreach ($photos as $photo)
                        
            <tr>        
                <!-- image review -->
                <td class="admin_content_image px-4 py-3"><img style='height:75px' src="../../{{$photo->image}}" /></a></td>  
                
                <!-- Uploader -->
                <td class="admin_content_author px-4 py-3"><a href="#">{{ucwords(strtolower($photo->uploader))}}</a></td>

                <!-- Post Content -->
                <td class='admin_content_body px-4 py-3'>{{Str::limit($photo->description, 40)}}...</td>

                <!-- Views -->
                <td class="admin_content_views px-4 py-3">{{$photo->viewed}}</td>

                <td class="admin_content_actions px-4 py-3"><a href="{{route('admin.photoalbums.delete', $photo->id)}}"><img src='../../images/delete.png' /></a></td>

</tr
@endforeach
>
</table>


@endsection