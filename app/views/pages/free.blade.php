@extends('layouts.master')

@section('content')
<section class="section section-main">
  <div class="container">
	<h1 class="section-heading">{{$title or 'TITLENYA MANA'}}</h1>
	<div class="section-content">
	  {{$content or 'CONTENTNYA MANA'}}
	</div>
  </div>
</section>
@stop

@section('scripts')
@stop

@section('styles')
@stop