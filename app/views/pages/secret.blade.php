@extends('layouts.master')

@section('content')
<section class="section section-light">
  <div class="container">
	@include('_partials.product-header')
	  <div class="col-sm-4 col-sm-offset-4 text-center">
		<h4>{{$question}}</h4>
		@if($picture)
		<div class="secret-question-image"><img src="{{URL::to($picture)}}" class="thumbnail"></div>
		@endif
		<form action="{{URL::route('site.secret.answer',array('lang'=> Request::segment(1)))}}" method="POST">
		  {{Form::token()}}
		  <div class="form-group">
			<input type="text" name="answer" class="form-control" placeholder="Masukkan jawaban Anda">
		  </div>
		  <input type="submit" value="Submit" class="btn btn-primary">
		  
		</form>
	  </div>
	</div>
  </div>
</section>
@stop

@section('scripts')
@stop

@section('styles')
@stop