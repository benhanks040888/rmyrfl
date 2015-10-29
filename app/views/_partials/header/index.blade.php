<header class="header hidden-xs">
  <div class="header-menu-other">
    <div class="container-fluid">
      <div class="pull-left header-menu-other-links">
        <a href="{{URL::route('site.about',array('lang'=> Request::segment(1)))}}">{{trans('menu.about')}} Romy Rafael</a>
        <a href="{{URL::route('site.affirmation',array('lang'=> Request::segment(1)))}}">{{trans('menu.affirmation')}}</a>
        <a href="{{URL::route('site.product',array('lang'=> Request::segment(1)))}}">{{trans('menu.product')}}</a>
        <a href="https://www.youtube.com/playlist?list=PLObURnEFJ80XKwv8eEgbhZCmfzVohEw35" target="_blank">Lintas Imaji (NET)</a>
      </div>
      <div class="pull-right">
        @include('_partials.language')
        {{-- <form action="{{URL::route('site.search',array('lang'=> Request::segment(1)))}}" class="search-form form-inline">
          <input class="form-control" type="text" name="q" placeholder="{{trans('menu.search')}}">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form> --}}
      </div>
    </div>
  </div>

  <nav class="navbar">
    <ul class="nav navbar-nav">
      <li><a href="{{URL::route('site.entertainer.home',array('lang'=> Request::segment(1)))}}" class="btn btn-tab @if(strtolower(Request::segment(2)) == 'corporate-entertainer') active @endif">Corporate Entertainer</a></li>
      <li><a href="{{URL::route('site.speaker.home',array('lang'=> Request::segment(1)))}}" class="btn btn-tab @if(strtolower(Request::segment(2)) == 'corporate-speaker') active @endif">Corporate Speaker</a></li>
      <li><a href="{{URL::route('site.therapist.home',array('lang'=> Request::segment(1)))}}" class="btn btn-tab @if(strtolower(Request::segment(2)) == 'certified-therapist') active @endif">Certified Therapist</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-button">
      <li>@include('_partials.contact-us')</li>
    </ul>
  </nav>

  <nav class="sub-navbar">
    <a href="{{URL::route('site.home',array('lang'=> Request::segment(1)))}}" class="logo"><img src="{{ assets_url('images/logo.png')}}" alt="Romy Rafael Hypnotheraphy"></a>
    <ul class="nav sub-navbar-nav">
	  @if(strtolower(Request::segment(2)) == 'corporate-speaker')
	    @include('_partials.header.corporate-speaker')
	  @elseif(strtolower(Request::segment(2)) == 'certified-therapist')
	    @include('_partials.header.certified-therapist')
	  @else
	    @include('_partials.header.corporate-entertainer')
	  @endif
    </ul>
  </nav>
</header>

@include('_partials.header.mobile')
