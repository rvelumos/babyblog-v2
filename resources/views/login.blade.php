<!doctype html>
<html>
<head>
<title>Admin</title>
</head>
<body><

{{ Form::open(array('url' => 'login')) }}
<h1>Login</h1>

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

<p>
    {{ Form::label('email', 'Email Address') }}
    {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) }}
</p>

<p>
    {{ Form::label('password', 'Wachtwoord') }}
    {{ Form::password('password') }}
</p>

<p>{{ Form::submit('Submit!') }}</p>
{{ Form::close() }}