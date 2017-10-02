@foreach ($modelsCs as $slug)

@if ($slug == "customer")
<li>
	<a {{ URL::current() == URL::route('site.speaker.customer',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.speaker.customer',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.customer')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "work")
<li>
	<a {{ URL::current() == URL::route('site.speaker.work',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.speaker.work',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.service')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "client")
<li>
	<a {{ URL::current() == URL::route('site.speaker.client',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.speaker.client',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.client')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "training")
<li>
	<a {{ URL::current() == URL::route('site.speaker.training',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.speaker.training',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.training')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "sesi-grup-kecil")
<li>
	<a {{ URL::current() == URL::route('site.speaker.group',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.speaker.group',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.menu-group')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "produk")
<li>
	<a {{ URL::current() == URL::route('site.speaker.product',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.speaker.product',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.menu-product')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "free-gift")
<li>
	<a {{ URL::current() == URL::route('site.speaker.gift',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.speaker.gift',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.menu-gift')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "associate-coach-and-team")
<li>
	<a {{ URL::current() == URL::route('site.speaker.association',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.speaker.association',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.menu-association')}}</strong></p>
	</a>
</li>
@endif

@endforeach