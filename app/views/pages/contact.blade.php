@extends('layouts.master')

@section('content')
<section class="section section-contact section-light">
  <div class="container">
	<h1 class="section-heading">Hubungi kami sekarang juga</h1>
	<div class="row">
	  <div class="col-sm-5 col-sm-offset-1 col-md-3 col-md-offset-2">
		<p><img src="{{assets_url('images/logo-big.png')}}" alt="Romy Rafael hypnotheraphy"></p>
		<div class="breather">
		  <h4 class="tt-normal">Romy Rafael<br>Hypnotheraphy Center</h4>
		  <p>Phone: 0818 399124, 0819 32433457<br>Email: <a href="#">info@romyrafael.net</a></p>
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