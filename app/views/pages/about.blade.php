@extends('layouts.master')

@section('content')
  <section class="section section-about">
    <div class="container">
      <h1 class="section-heading">{{$romy['title']}}</h1>
    </div>

    <div class="section-about-cover"></div>
    <div class="container">
      <div class="section-content wysiwyg-content">
        {{$romy['content']}}
        
    	  <h2>{{$management['title']}}</h2>
        {{$management['content']}}
      </div>
    </div>
  </section>
@stop

@section('scripts')
@stop

@section('styles')
@stop