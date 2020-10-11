@extends('layouts.admin-master')

@section('content')

@if(Session::has('stored_message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }} m-4">{{ Session::get('stored_message') }}</p>
@endif

<a href="{{route('admin.posts.create')}}"><input type='button' class='btn btn-success m-2' value='Post toevoegen' /></a>

<table class='admin_content_items bg-light'>
<tr>
    <th class="p-4">Titel</th>
    <th class="p-4">Uploader</th>
    <th class="p-4">Inhoud</th>
    <th class="p-4">Datum</th>
    <th class="p-4">Acties</th>
</tr>
@foreach ($posts as $post)
<tr>
   <!-- Title -->
   <td class="admin_content_title px-4 py-3"><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
      
    <!-- Author -->
    <td class="admin_content_author px-4 py-3"><a href="#">{{ucwords(strtolower($post->author))}}</a></td>

    <!-- Post Content -->
    <td class='admin_content_body px-4 py-3'>{{Str::limit($post->body, 20)}}...</td>

    <!-- Date/Time -->
    <td class='admin_content_date px-4 py-3'>{{$post->created_at->diffForHumans()}}</td>
    <td class="admin_content_actions px-4 py-3"><a href="{{route('admin.posts.edit', $post->id)}}"><img src='../images/edit.png' /></a> <a href="{{route('admin.posts.delete', $post->id)}}"><img src='../images/delete.png' /></a></td>
</tr>
@endforeach

</table>

<div class="pagination">
{{ $posts->links() }}
</div>




@endsection