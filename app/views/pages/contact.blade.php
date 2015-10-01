@extends('layouts.master')

@section('content')
<section class="section section-contact section-light">
  <div class="container">
	<h1 class="section-heading">{{trans('contact.contact-us')}}</h1>
	
	@include('_partials.notification')
	
	<div class="row">
	  <div class="col-sm-5 col-sm-offset-1 col-md-3 col-md-offset-2">
		<p><img src="{{assets_url('images/logo-big.png')}}" alt="Romy Rafael hypnotheraphy"></p>
		<div class="breather">
		  <h4 class="tt-normal">Romy Rafael<br>Hypnotheraphy Center</h4>
		  <p>Phone: 0818 399124, 0819 32433457<br>Email: <a href="#">info@romyrafael.net</a></p>
		</div>
	  </div>
	  <div class="col-sm-5">
		<form action="{{URL::route('site.contact.post',array('lang'=> Request::segment(1)))}}" method="POST">
		  {{Form::token()}}
		  <div class="form-group">
			<input type="text" name="name" required class="form-control" placeholder="{{trans('contact.name')}}">
		  </div>
		  <div class="form-group">
			<input type="email" name="email" required class="form-control" placeholder="{{trans('contact.email')}}">
		  </div>
		  <div class="form-group">
			<input type="tel" name="phone" required class="form-control" placeholder="{{trans('contact.phone')}}">
		  </div>
		  <div class="form-group">
			<input type="text" name="address" class="form-control" placeholder="{{trans('contact.address')}}">
		  </div>
		   <div class="form-group">
			<input type="text" name="subject" required class="form-control" placeholder="{{trans('contact.subject')}}">
		  </div>
		  <div class="form-group">
			<textarea class="form-control" required name="message" placeholder="{{trans('contact.message')}}"></textarea>
		  </div>
		  <div class="form-group">
		  {{ Form::captcha() }}
		   </div>
		    <div class="form-group">
		  <input type="submit" class="btn btn-primary" value="{{trans('contact.send')}}">
		   </div>
		  
		{{Form::close()}}
	  </div>
	</div>
  </div>
</section>
@stop

@section('scripts')
<script src='https://www.google.com/recaptcha/api.js'></script>
@stop

@section('styles')
@stop