<nav class="navbar navbar-romy-mobile visible-xs-block">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <a class="logo-mobile" href="{{ route('site.home', array('lang' => Request::segment(1))) }}">Romy Rafael Hypnoteraphy</a>

    @include('_partials.language')

    {{-- <div class="head-search-container">
      <a href="#" class="head-search-toggle js-head-search-toggle"><i class="fa fa-search"></i></a>

      <form action="{{ URL::route('site.search',array('lang'=> Request::segment(1))) }}" class="search-form">
        <div class="form-group">
          <input type="text" name="q" class="form-control" placeholder="{{trans('menu.search')}}">
          <button type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </form>
    </div> --}}
  </div>

  <div class="collapse navbar-collapse" id="navbar">
    <ul class="nav navbar-nav">
      <li><a href="{{ route('site.contact',array('lang'=> Request::segment(1))) }}" class="contact">{{ trans('menu.contact') }}</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          Corporate Entertainer
          <i class="dropdown-indicator fa fa-chevron-down"></i>
        </a>
        <ul class="dropdown-menu" role="menu">
          <li>
            <a href="{{ URL::route('site.entertainer.customer', array('lang'=> Request::segment(1)))}}">
              {{trans('menu.customer')}}
            </a>
          </li>
          <li>
            <a href="{{URL::route('site.entertainer.work',array('lang'=> Request::segment(1)))}}">
              {{trans('menu.service')}}
            </a>
          </li>
          <li>
            <a href="{{URL::route('site.entertainer.client',array('lang'=> Request::segment(1)))}}">
              {{trans('menu.client')}}
            </a>
          </li>
          <li>
            <a href="{{URL::route('site.entertainer.show',array('lang'=> Request::segment(1)))}}">
              {{trans('menu.show')}}
            </a>
          </li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          Corporate Speaker
          <i class="dropdown-indicator fa fa-chevron-down"></i>
        </a>
        <ul class="dropdown-menu" role="menu">
          <li>
            <a href="{{URL::route('site.speaker.customer',array('lang'=> Request::segment(1)))}}">
              {{trans('menu.customer')}}
            </a>
            </li>
          <li>
            <a href="{{URL::route('site.speaker.work',array('lang'=> Request::segment(1)))}}">
              {{trans('menu.service')}}
            </a>
          </li>
          <li>
            <a href="{{URL::route('site.speaker.client',array('lang'=> Request::segment(1)))}}">
              {{trans('menu.client')}}
            </a>
          </li>
          <li>
            <a href="{{URL::route('site.speaker.training',array('lang'=> Request::segment(1)))}}">
              {{trans('menu.training')}}
            </a>
          </li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          Certified Therapist
          <i class="dropdown-indicator fa fa-chevron-down"></i>
        </a>
        <ul class="dropdown-menu" role="menu">
          <li>
            <a href="{{URL::route('site.therapist.customer',array('lang'=> Request::segment(1)))}}">
              {{trans('menu.customer')}}
            </a>
          </li>

          <li>
            <a href="{{URL::route('site.therapist.work',array('lang'=> Request::segment(1)))}}">
              {{trans('menu.service')}}
            </a>
          </li>

          <li>
            <a href="{{URL::route('site.therapist.training',array('lang'=> Request::segment(1)))}}">
              {{trans('menu.training')}}
            </a>
          </li>

          <li>
            <a href="{{URL::route('site.therapist.group-therapy',array('lang'=> Request::segment(1)))}}">
              {{trans('menu.therapy-group')}}
            </a>
          </li>

          <li>
            <a href="{{URL::route('site.therapist.personal-therapy',array('lang'=> Request::segment(1)))}}">
              {{trans('menu.therapy-personal')}}
            </a>
          </li>
          
          <li>
            <a href="{{URL::route('site.therapist.association',array('lang'=> Request::segment(1)))}}">
              {{trans('menu.therapist-association')}}
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>