  <li>
	<a href="{{URL::route('site.therapist.customer',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.customer')}}</strong></p>
	  <small class="text-muted">{{trans('menu.customer-needs')}}</small>
	</a>
  </li>

  <li>
	<a href="{{URL::route('site.therapist.work',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.service')}}</strong></p>
	  <small class="text-muted">{{trans('menu.work')}}</small>
	</a>
  </li>

  <li>
	<a href="{{URL::route('site.therapist.training',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.training')}}</strong></p>
	  <small class="text-muted">{{trans('menu.training-description')}}</small>
	</a>
  </li>

  <li>
	<a href="{{URL::route('site.therapist.group-therapy',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.therapy-group')}}</strong></p>
	  <small class="text-muted">Lorem ipsum dolorem</small>
	</a>
  </li>

  <li>
	<a href="{{URL::route('site.therapist.personal-therapy',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.therapy-personal')}}</strong></p>
	  <small class="text-muted">Lorem ipsum dolorem</small>
	</a>
  </li>
  
  <li>
	<a href="{{URL::route('site.therapist.association',array('lang'=> Request::segment(1)))}}">
	  <p><strong>{{trans('menu.therapist-association')}}</strong></p>
	  <small class="text-muted">Lorem ipsum dolorem</small>
	</a>
  </li>