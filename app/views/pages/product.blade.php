@extends('layouts.master')

@section('content')
<section class="section section-light">
  <div class="container">
	<h1 class="section-heading">Produk Kami Yang Dapat Mengubah Hidup Anda</h1>
	<div class="section-content">
		<div class="product-nav">
		  <ul class="nav nav-tabs">
			<li><a href="#" class="btn btn-tab active">Buku & CD</a></li>
			<li><a href="#" class="btn btn-tab">Secret Item</a></li>
		  </ul>
		  <div class="product-sorter">
			<span class="tt-uppercase">Urut berdasarkan</span> 
			<select class="form-control">
			  <option value="">Pilih</option>
			  <option value="">Harga Tinggi ke Rendah</option>
			</select>
		  </div>
		</div>
<div class="row products-list">
	<div class="col-sm-3">
	  <div class="product-item">
		<div class="product-image">
		  <img src="assets/images/product-image.jpg" alt="Product Image">
		</div>
		<h4 class="product-name">Self Hypnosis Untuk Menghentikan Kecanduan Merokok</h4>
		<div class="product-price">
		  <p class="old-price">Harga: Rp 160.000</p>
		  <p class="new-price">Promo: Rp 120.000 <span class="label-discount">17%</span></p>
		</div>
		<a href="#" class="btn btn-primary">Beli</a>
	  </div>
	</div>

	<div class="col-sm-3">
	  <div class="product-item">
		<div class="product-image">
		  <img src="assets/images/product-image2.jpg" alt="Product Image 2">
		</div>
		<h4 class="product-name">Self Hypnosis Untuk Menghentikan Kecanduan Merokok</h4>
		<div class="product-price">
		  <p class="old-price">&nbsp;</p>
		  <p class="new-price">Harga: Rp 120.000</p>
		</div>
		<a href="#" class="btn btn-primary">Beli</a>
	  </div>
	</div>

	<div class="col-sm-3">
	  <div class="product-item">
		<div class="product-image">
		  <img src="assets/images/product-image.jpg" alt="Product Image">
		</div>
		<h4 class="product-name">Self Hypnosis Untuk Menghentikan Kecanduan Merokok</h4>
		<div class="product-price">
		  <p class="old-price">Harga: Rp 160.000</p>
		  <p class="new-price">Promo: Rp 120.000 <span class="label-discount">17%</span></p>
		</div>
		<a href="#" class="btn btn-primary">Beli</a>
	  </div>
	</div>

	<div class="col-sm-3">
	  <div class="product-item">
		<div class="product-image">
		  <img src="assets/images/product-image2.jpg" alt="Product Image 2">
		</div>
		<h4 class="product-name">Self Hypnosis Untuk Menghentikan Kecanduan Merokok</h4>
		<div class="product-price">
		  <p class="old-price">&nbsp;</p>
		  <p class="new-price">Harga: Rp 120.000</p>
		</div>
		<a href="#" class="btn btn-primary">Beli</a>
	  </div>
	</div>

	<div class="col-sm-3">
	  <div class="product-item">
		<div class="product-image">
		  <img src="assets/images/product-image.jpg" alt="Product Image">
		</div>
		<h4 class="product-name">Self Hypnosis Untuk Menghentikan Kecanduan Merokok</h4>
		<div class="product-price">
		  <p class="old-price">Harga: Rp 160.000</p>
		  <p class="new-price">Promo: Rp 120.000 <span class="label-discount">17%</span></p>
		</div>
		<a href="#" class="btn btn-primary">Beli</a>
	  </div>
	</div>

	<div class="col-sm-3">
	  <div class="product-item">
		<div class="product-image">
		  <img src="assets/images/product-image2.jpg" alt="Product Image 2">
		</div>
		<h4 class="product-name">Self Hypnosis Untuk Menghentikan Kecanduan Merokok</h4>
		<div class="product-price">
		  <p class="old-price">&nbsp;</p>
		  <p class="new-price">Harga: Rp 120.000</p>
		</div>
		<a href="#" class="btn btn-primary">Beli</a>
	  </div>
	</div>

	<div class="col-sm-3">
	  <div class="product-item">
		<div class="product-image">
		  <img src="assets/images/product-image.jpg" alt="Product Image">
		</div>
		<h4 class="product-name">Self Hypnosis Untuk Menghentikan Kecanduan Merokok</h4>
		<div class="product-price">
		  <p class="old-price">Harga: Rp 160.000</p>
		  <p class="new-price">Promo: Rp 120.000 <span class="label-discount">17%</span></p>
		</div>
		<a href="#" class="btn btn-primary">Beli</a>
	  </div>
	</div>

	<div class="col-sm-3">
	  <div class="product-item">
		<div class="product-image">
		  <img src="assets/images/product-image2.jpg" alt="Product Image 2">
		</div>
		<h4 class="product-name">Self Hypnosis Untuk Menghentikan Kecanduan Merokok</h4>
		<div class="product-price">
		  <p class="old-price">&nbsp;</p>
		  <p class="new-price">Harga: Rp 120.000</p>
		</div>
		<a href="#" class="btn btn-primary">Beli</a>
	  </div>
	</div>

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