@extends('layouts.master')

@section('content')
<section class="section section-light">
  <div class="container">
	<h1 class="section-heading tt-normal">{{trans('contact.buy-header1')}}<br>
	{{Request::segment(1)=='en'?$product->name_en:$product->name_id}}<br>
	{{trans('contact.buy-header2')}} :</h1>
	
	@include('_partials.notification')
	
	<div class="row">
	  <div class="col-sm-5 col-sm-offset-1 col-md-3 col-md-offset-2">
		<div class="product-item">
		  <div class="product-image">
			<img src="{{URL::to($product->image)}}" alt="Product Image">
		  </div>
		  <h4 class="product-name">{{Request::segment(1)=='en'?$product->name_en:$product->name_id}}</h4>
		  <div class="product-price">
			<p class="old-price">@if($product->masked_price)Harga : Rp {{number_format ($product->masked_price)}} @endif</p>
			<p class="new-price">@if($product->masked_price)Promo @else Harga @endif: Rp {{number_format ($product->price)}} @if($product->masked_price)<span class="label-discount">{{$product->discount}}%</span>@endif</p>
		  </div>
		</div>
	  </div>
	  
	  <div class="col-sm-5">
		<form action="{{URL::route('site.product.buy.post',array('lang'=> Request::segment(1)))}}" method="POST">
		  {{Form::token()}}
		  <input type="hidden" name="product_id" value="{{$product->id}}"/>
		  
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
			<textarea class="form-control" name="message" placeholder="{{trans('contact.message')}}"></textarea>
		  </div>
		  <p><small>*{{trans('contact.buy-info')}}</small></p>
		  <div class="form-group">
		  {{ Form::captcha() }}
		   </div>
		  <div class="form-group">
		  <input type="submit" class="btn btn-primary" value="{{trans('contact.send')}}">
		   </div>
		  
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