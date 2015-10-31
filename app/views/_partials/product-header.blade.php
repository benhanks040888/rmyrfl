<h1 class="section-heading">{{trans('product.headline')}}</h1>
<div class="section-content">
<div class="product-nav">
  <ul class="nav nav-tabs">
	<li><a href="{{URL::route('site.product',array('lang'=> Request::segment(1)))}}" class="btn btn-tab {{ (URL::current() == URL::route('site.product',array('id')) || URL::current() == URL::route('site.product',array('en'))) ? 'active':''}}">Buku & CD</a></li>
	<li><a href="{{URL::route('site.product.secret',array('lang'=> Request::segment(1)))}}" class="btn btn-tab {{ (URL::current() == URL::route('site.product.secret',array('id')) || URL::current() == URL::route('site.product.secret',array('en'))) ? 'active':''}}">Secret Item</a></li>
  </ul>
  <div class="product-sorter">
	<span class="tt-uppercase">{{trans('product.sort')}}</span> 
	<select name="sort" id="lstSort" class="form-control">
	  <option value="low">{{trans('product.price-low')}}</option>
	  <option value="high">{{trans('product.price-high')}}</option>
	</select>
  </div>
</div>