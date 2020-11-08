@extends('layouts.admin-master')

@section('content')

@if(Session::has('stored_message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }} m-4">{{ Session::get('stored_message') }}</p>
@endif

<table class='admin_log_items bg-light p-3'>
    <tr class='heading bg-secondary'><th>ID</th><th>{{$log->id}}</th><th> <a href="{{route('admin.logs.delete', $log->id)}}"><img src='../../../images/delete.png' /></a></th></tr>
    <tr class='bg-light'><td>Datum</td><td>{{$log->created_at}}</td></tr>
    <tr class='bg-light'><td>Pagina</td><td>{{$log->page}}</td></tr>
    <tr class='bg-light'><td>Gebruiker</td><td>{{$log->user}}</td></tr>
    <tr class='bg-light'><td>IP</td><td>{{$log->ip}}</td></tr>
    <tr class='bg-light'><td>URL</td><td>{{$log->ip}}</td></tr>
    <tr class='bg-light'><td>Herkomst</td><td>{{$log->referrer}}</td></tr>
    <tr class='bg-light'><td>Browser</td><td>{{$log->browser}}</td></tr>
    <tr class='bg-light'><td>Methode</td><td>{{$log->method}}</td></tr>
    <tr class='bg-light'><td>OS user</td><td>{{$log->os_user}}</td></tr>
    <tr class='bg-light'><td>OS server</td><td>{{$log->os_server}}</td></tr>
    <tr class='bg-light'><td>Protocol</td><td>{{$log->protocol}}</td></tr>
    <tr class='bg-light'><td>Extra</td><td>{{$log->extra}}</td></tr>
    <tr class='bg-light'><td>Message</td><td>{{$log->message}}</td></tr>    
</table>

@endsection