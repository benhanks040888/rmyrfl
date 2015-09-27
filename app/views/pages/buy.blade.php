@extends('layouts.master')

@section('content')
<section class="section section-light">
  <div class="container">
	<h1 class="section-heading tt-normal">UNTUK MEMBELI<br>
	{{strtoupper($product->name_en)}}<br>
	SILAHKAN ISI DATA BERIKUT INI:</h1>
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
		<form>
		  <div class="form-group">
			<input type="text" class="form-control" placeholder="Nama Anda">
		  </div>
		  <div class="form-group">
			<input type="email" class="form-control" placeholder="Email">
		  </div>
		  <div class="form-group">
			<input type="tel" class="form-control" placeholder="Telepon">
		  </div>
		  <div class="form-group">
			<input type="text" class="form-control" placeholder="Alamat Lengkap">
		  </div>
		  <div class="form-group">
			<textarea class="form-control" placeholder="Pesan"></textarea>
		  </div>
		  <p><small>*Order hanya akan diproses bila sudah transfer pembayaran. Tunggu konfirmasi dari kami untuk  mengetahui biaya kirimnya.</small></p>
		  <input type="submit" class="btn btn-primary" value="Kirim">
		  
		  
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