<h1 class="section-heading">Produk Kami Yang Dapat Mengubah Hidup Anda</h1>
<div class="section-content">
<div class="product-nav">
  <ul class="nav nav-tabs">
	<li><a href="{{URL::route('site.product',array('lang'=> Request::segment(1)))}}" class="btn btn-tab {{ (URL::current() == URL::route('site.product',array('id')) || URL::current() == URL::route('site.product',array('en'))) ? 'active':''}}">Buku & CD</a></li>
	<li><a href="{{URL::route('site.product.secret',array('lang'=> Request::segment(1)))}}" class="btn btn-tab {{ (URL::current() == URL::route('site.product.secret',array('id')) || URL::current() == URL::route('site.product.secret',array('en'))) ? 'active':''}}">Secret Item</a></li>
  </ul>
  <div class="product-sorter">
	<span class="tt-uppercase">Urut berdasarkan</span> 
	<select class="form-control">
	  <option value="">Pilih</option>
	  <option value="">Harga Tinggi ke Rendah</option>
	</select>
  </div>
</div>