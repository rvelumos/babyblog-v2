@extends('layouts.master')

@section('content')

<main role="main">

<div class="album py-5">
  <div class="container">

    <div class="row">
@php 
$block_item = 0;
@endphp

@foreach ($photoalbums as $photoalbum)   
            <div class="col-md-4" >
              <div class="card mb-4 box-shadow" style="background-image:url({{$photoalbum->thumb}});background-size: 100%; background-repeat:no-repeat;">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" >
                <div class="card-body">
                    <a href="{{route('photoalbum.show', $photoalbum->id)}}"><p class="card-text text-justify text-uppercase">{{$photoalbum->name}}</p></a>                  
                </div>
              </div>
            </div>
@php
$block_item++;

if($block_item % 3 == 0){
@endphp
</div><div class="row">
@php
}
@endphp

@endforeach

</div></div>
</div>

@endsection
