@extends('layouts.master')

@section('content')
<section class="section section-main">
  <div class="container">
  	<h1 class="section-heading">{{$title or ''}}</h1>
  	<div class="section-content wysiwyg-content">
  	  {{$content or ''}}
  	</div>
  </div>
</section>
@stop

@section('scripts')
@stop

@section('styles')
@stop