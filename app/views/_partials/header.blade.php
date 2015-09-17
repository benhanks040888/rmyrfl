<header class="header">
  <div class="header-menu-other">
    <div class="container-fluid">
      <div class="pull-left header-menu-other-links">
        <a href="{{URL::route('site.about',array('lang'=> Request::segment(1)))}}">{{trans('menu.about')}} Romy Rafael</a>
        <a href="#">{{trans('menu.affirmation')}}</a>
        <a href="{{URL::route('site.product',array('lang'=> Request::segment(1)))}}">{{trans('menu.product')}}</a>
        <a href="#">Lintas Imaji (NET)</a>
      </div>
      <div class="pull-right">
        @include('_partials.language')
        <form action="" class="search-form form-inline">
          <input class="form-control" type="text" name="q" placeholder="{{trans('menu.search')}}">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>
  </div>

  <nav class="navbar">
    <ul class="nav navbar-nav">
      <li><a href="{{URL::route('site.entertainer.home',array('lang'=> Request::segment(1)))}}" class="btn btn-tab @if(strtolower(Request::segment(2)) == 'corporate-entertainer') active @endif">Corporate Entertainer</a></li>
      <li><a href="#" class="btn btn-tab @if(strtolower(Request::segment(2)) == 'corporate-speaker') active @endif">Corporate Speaker</a></li>
      <li><a href="#" class="btn btn-tab @if(strtolower(Request::segment(2)) == 'certified-therapist') active @endif">Certified Therapist</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-button">
      <li>@include('_partials.contact-us')</li>
    </ul>
  </nav>

  <nav class="sub-navbar">
    <a href="#" class="logo"><img src="{{ assets_url('images/logo.png')}}" alt="Romy Rafael Hypnotheraphy"></a>
    <ul class="nav sub-navbar-nav">
      <li>
        <a href="#">
          <p><strong>{{trans('menu.customer')}}</strong></p>
          <small class="text-muted">Siapa yang butuh jasa kami</small>
        </a>
      </li>

      <li>
        <a href="#">
          <p><strong>{{trans('menu.service')}}</strong></p>
          <small class="text-muted">Cara kerja kami</small>
        </a>
      </li>

      <li>
        <a href="{{URL::route('site.entertainer.client',array('lang'=> Request::segment(1)))}}">
          <p><strong>{{trans('menu.client')}}</strong></p>
          <small class="text-muted">Apa kata klien kami</small>
        </a>
      </li>

      <li>
        <a href="#">
          <p><strong>Sesi terapi</strong></p>
          <small class="text-muted">Lorem ipsum dolorem</small>
        </a>
      </li>

      <li>
        <a href="#">
          <p><strong>Asosiasi terapis kami</strong></p>
          <small class="text-muted">Lorem ipsum dolorem</small>
        </a>
      </li>
    </ul>
  </nav>
</header>