@foreach ($modelsCt as $slug)
@if ($slug == "customer")
<li>
	<a {{ URL::current() == URL::route('site.therapist.customer',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.therapist.customer',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.customer')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "layanan")
<li>
	<a {{ URL::current() == URL::route('site.therapist.service',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.therapist.service',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.service')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "cara-kerja-kami")
<li>
	<a {{ URL::current() == URL::route('site.therapist.training',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.therapist.training',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.one-how-we-work')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "therapy-case-study")
<li>
	<a {{ URL::current() == URL::route('site.therapist.group-therapy',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.therapist.group-therapy',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.therapy-group')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "personal-therapy")
<li>
	<a {{ URL::current() == URL::route('site.therapist.personal-therapy',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.therapist.personal-therapy',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.therapy-personal')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "association")
<li>
	<a {{ URL::current() == URL::route('site.therapist.association',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.therapist.association',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.therapist-association')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "sesi-grup-kecil")
<li>
	<a {{ URL::current() == URL::route('site.therapist.group',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.therapist.group',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.menu-group')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "produk")
<li>
	<a {{ URL::current() == URL::route('site.therapist.product',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.therapist.product',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.menu-product')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "free-gift")
<li>
	<a {{ URL::current() == URL::route('site.therapist.gift',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.therapist.gift',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.menu-gift')}}</strong></p>
	</a>
</li>
@endif

@if ($slug == "associate-coach-and-team")
<li>
	<a {{ URL::current() == URL::route('site.therapist.associationcoach',array('lang'=> Request::segment(1))) ? 'class="active"' : '' }} href="{{URL::route('site.therapist.associationcoach',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.menu-association')}}</strong></p>
	</a>
</li>
@endif

@endforeach