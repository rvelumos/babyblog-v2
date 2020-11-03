@extends('layouts.admin-master')

@section('content')

@if(Session::has('stored_message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }} m-4">{{ Session::get('stored_message') }}</p>
@endif

<a href="{{route('admin.photoalbums.create')}}"><input type='button' class='btn btn-success my-2' value='Fotalbum toevoegen' /></a>

<table class='admin_content_items bg-light'>
<tr>
    <th class="p-4">Titel</th>
    <th class="p-4">Uploader</th>
    <th class="p-4">Omschrijving</th>
    <th class="p-4">Aantal foto's</th>    
    <th class="p-4">Acties</th>
</tr>
@foreach ($photoalbums as $photoalbum)
<tr>
   <!-- Title -->
   <td class="admin_content_title px-4 py-3"><a href="{{route('admin.photoalbumphotos.index', $photoalbum->id)}}">{{$photoalbum->name}}</a></td>
      
    <!-- Author -->
    <td class="admin_content_author px-4 py-3"><a href="#">{{ucwords(strtolower($photoalbum->author))}}</a></td>

    <!-- Post Content -->
    <td class='admin_content_body px-4 py-3'>{{Str::limit($photoalbum->description, 20)}}...</td>

    <!-- Num images -->
    <td class='admin_content_count px-4 py-3'>{{App\Photoalbum::countAlbumPhotos($photoalbum->id)}}</td>    
    
    <td class="admin_content_actions px-4 py-3"><a href="{{route('admin.photoalbumphotos.index', $photoalbum->id)}}"><img src='../images/images.png' /></a> <a href="{{route('admin.photoalbums.edit', $photoalbum->id)}}"><img src='../images/edit.png' /></a> <a href="{{route('admin.photoalbums.delete', $photoalbum->id)}}"><img src='../images/delete.png' /></a></td>
</tr>
@endforeach

</table>

<div class="pagination">
{{ $photoalbums->links() }}
</div>




@endsection