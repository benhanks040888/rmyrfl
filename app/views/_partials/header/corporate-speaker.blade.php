<li>
	<a href="{{URL::route('site.speaker.customer',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.customer')}}</strong></p>
	  <small class="text-muted">{{trans('menu.customer-needs')}}</small>
	</a>
  </li>

  <li>
	<a href="{{URL::route('site.speaker.work',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.service')}}</strong></p>
	  <small class="text-muted">{{trans('menu.work')}}</small>
	</a>
  </li>

  <li>
	<a href="{{URL::route('site.speaker.client',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.client')}}</strong></p>
	  <small class="text-muted">{{trans('menu.client-says')}}</small>
	</a>
  </li>

  <li>
	<a href="{{URL::route('site.speaker.training',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.training')}}</strong></p>
	  <small class="text-muted">{{trans('menu.training-description')}}</small>
	</a>
  </li>