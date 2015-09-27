@extends('layouts.master')

@section('content')
<section class="section section-light">
  <div class="container">
	@include('_partials.product-header')
	  <div class="col-sm-4 col-sm-offset-4 text-center">
		<h4>Siapa nama orang di bawah ini?</h4>
		<div class="secret-question-image"><img src="assets/images/magician-image.jpg" class="thumbnail"></div>
		<form>
		  <div class="form-group">
			<input type="text" class="form-control" placeholder="Masukkan jawaban Anda">
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