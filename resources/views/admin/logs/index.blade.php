@extends('layouts.admin-master')

@section('content')

@if(Session::has('stored_message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }} m-4">{{ Session::get('stored_message') }}</p>
@endif

<table class='admin_log_items bg-light'>
<tr>
    <th class="p-4">ID</th>
    <th class="p-4">IP</th>
    <th class="p-4">URL</th>
    <th class="p-4">Message</th>
    <th class="p-4">Datum</th>
    <th class="p-4">Acties</th>
</tr>
@foreach ($logs as $log)
<tr>
   <!-- Title -->
   <td class="admin_content_title px-4 py-3"><a href="{{route('admin.logs.show', $log->id)}}">{{$log->id}}</a></td>
      
    <!-- IP address -->
    <td class="admin_content_author px-4 py-3">{{$log->ip}}</td>
    
    <!-- URL address -->
    <td class="admin_content_author px-4 py-3">{{Str::limit($log->url, 30, '...')}}</td>

    <!-- Message -->
    <td class='admin_content_body px-4 py-3'>{{Str::limit($log->message, 25, '...')}}</td>

    <!-- Date/Time -->
    <td class='admin_content_date px-4 py-3'>{{$log->created_at->diffForHumans()}}</td>
    <td class="admin_content_actions px-4 py-3"><a href="{{route('admin.logs.show', $log->id)}}"><img src='../images/view.png' /></a> <a href="{{route('admin.logs.delete', $log->id)}}"><img src='../images/delete.png' /></a></td>
</tr>
@endforeach

</table>

<div class="pagination">
{{ $logs->links() }}
</div>

@endsection