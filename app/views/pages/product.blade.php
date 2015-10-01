@extends('layouts.master')

@section('content')
<section class="section section-light">
  <div class="container">
	@include('_partials.notification')
	
	@include('_partials.product-header')
	
	<div class="row products-list">
		@if(count($products) == 0)
			<p>No products available</p>
		@endif
		@foreach($products as $product)
		<div class="col-sm-3">
		  <div class="product-item">
			<div class="product-image">
			  <img src="{{URL::to($product->image)}}" alt="{{Request::segment(1)=='en'?$product->name_en:$product->name_id}}">
			</div>
			<h4 class="product-name">{{Request::segment(1)=='en'?$product->name_en:$product->name_id}}</h4>
			<div class="product-price">
			  <p class="old-price">@if($product->masked_price)Harga : Rp {{number_format ($product->masked_price)}} @endif</p>
			  <p class="new-price">@if($product->masked_price)Promo @else Harga @endif: Rp {{number_format ($product->price)}} @if($product->masked_price)<span class="label-discount">{{$product->discount}}%</span>@endif</p>
			</div>
			<a href="{{URL::route('site.product.buy',array('lang'=> Request::segment(1),'slug'=>$product->slug))}}" class="btn btn-primary">Beli</a>
		  </div>
		</div>
		@endforeach
	</div>
	<div class="text-right pagination-wrapper">
	<ul class="pagination">
	  <li class="prev">
		<a href="#" aria-label="Previous">
		  <span aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
		</a>
	  </li>
	  <li class="active"><a href="#">1</a></li>
	  <li><a href="#">2</a></li>
	  <li><a href="#">3</a></li>
	  <li class="next">
		<a href="#" aria-label="Next">
		  <span aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
		</a>
	  </li>
	</ul>

	</div>
	</div>
</div>
</section>
@stop

@section('scripts')
@stop

@section('styles')
@stop