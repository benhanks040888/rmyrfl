@foreach ($modelsCe as $slug)
@if ($slug == "customer")
<li>
	<a {{ URL::current() == URL::route('site.entertainer.customer',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.entertainer.customer',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.customer')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "work")
<li>
	<a {{ URL::current() == URL::route('site.entertainer.work',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.entertainer.work',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.service')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "client")
<li>
	<a {{ URL::current() == URL::route('site.entertainer.client',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.entertainer.client',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.client')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "show")
<li>
	<a href="https://www.youtube.com/playlist?list=PLObURnEFJ80XKwv8eEgbhZCmfzVohEw35" target="_blank">
	  <p><strong>{{trans('menu.show')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "sesi-grup-kecil")
<li>
	<a {{ URL::current() == URL::route('site.entertainer.group',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.entertainer.group',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.menu-group')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "produk")
<li>
	<a {{ URL::current() == URL::route('site.entertainer.product',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.entertainer.product',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.menu-product')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "free-gift")
<li>
	<a {{ URL::current() == URL::route('site.entertainer.gift',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.entertainer.gift',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.menu-gift')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "associate-coach-and-team")
<li>
	<a {{ URL::current() == URL::route('site.entertainer.association',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.entertainer.association',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.menu-association')}}</strong></p>
	</a>
</li>
@endif

@endforeach