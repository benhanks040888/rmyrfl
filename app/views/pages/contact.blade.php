@extends('layouts.master')

@section('content')
<section class="section section-contact section-light">
  <div class="container">
		<h1 class="section-heading">{{trans('contact.contact-us')}}</h1>
		{{$contact_copy}}
		
		<div class="section-content">
			<div class="row">
			  <div class="col-sm-5 col-sm-offset-1 col-md-3 col-md-offset-2">
					<p><img src="{{assets_url('images/logo-big.png')}}" alt="Romy Rafael hypnotheraphy"></p>
					<div class="breather">
					  <h4 class="tt-normal">Romy Rafael<br>Hypnotheraphy Center</h4>
					  <p>Phone: +62.81.282.111.869, +62.87.882.330.696, +62.81.212.127.212<br>Email: <a href="mailto:info@romyrafael.com">info@romyrafael.com</a>, <a href="mailto:romyrafaelmind@gmail.com">romyrafaelmind@gmail.com</a></p>
					</div>
			  </div>
			  <div class="col-sm-5">
					@include('_partials.notification')
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
							<input type="text" name="address" required class="form-control" placeholder="{{trans('contact.address')}}">
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
  </div>
</section>
@stop

@section('scripts')
	<script src='https://www.google.com/recaptcha/api.js'></script>
@stop