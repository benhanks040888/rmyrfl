<div class="btn-group lang-selector">
	<a href="{{URL::route(Route::currentRouteName(), array('id'))}}" class="btn btn-default @if(Request::segment(1)=='id')active @endif"><img src="{{ assets_url('images/flags/id.png')}}" alt="Indonesia"></a>
	<a href="{{URL::route(Route::currentRouteName(), array('en'))}}" class="btn btn-default @if(Request::segment(1)=='en')active @endif"><img src="{{ assets_url('images/flags/en.png')}}" alt="English"></a>
</div>