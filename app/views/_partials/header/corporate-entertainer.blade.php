<li>
	<a href="{{URL::route('site.entertainer.customer',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.customer')}}</strong></p>
	  <small class="text-muted">{{trans('menu.customer-needs')}}</small>
	</a>
  </li>

  <li>
	<a href="{{URL::route('site.entertainer.work',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.service')}}</strong></p>
	  <small class="text-muted">{{trans('menu.work')}}</small>
	</a>
  </li>

  <li>
	<a href="{{URL::route('site.entertainer.client',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.client')}}</strong></p>
	  <small class="text-muted">{{trans('menu.client-says')}}</small>
	</a>
  </li>

  <li>
	<a href="{{URL::route('site.entertainer.show',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.show')}}</strong></p>
	  <small class="text-muted">{{trans('menu.show-description')}}</small>
	</a>
  </li>