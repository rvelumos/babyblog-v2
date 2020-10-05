<!doctype html>
<html>
<head>
<title>CMS Admin</title>
</head>
<body>

{!! Form::open(['method'=>'PUT', 'route'=> 'admin.doLogin']) !!}
<h1>Babyblog Login</h1>

<p>
    {{ $errors->first('username') }}
    {{ $errors->first('password') }}
</p>

<div class='form-group mt-2'>
    {{!! Form::label('username', 'Gebruikersnaam') !!}}
    {{!! Form::text('username') !!}}
</div>

<div class='form-group mt-2'>
    {{!! Form::label('password', 'Wachtwoord') !!}}
    {{!! Form::password('password') !!}}
</div>
<div class='form-group mt-2'>                
    {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}            
</div>
{{!! Form::close() !!}}