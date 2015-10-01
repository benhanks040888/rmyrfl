<header class="header simple-header hidden-xs">
  <div class="container-fluid">
  <a href="#" class="logo"><img src="{{ assets_url('images/logo.png')}}" alt="Romy Rafael Hypnotheraphy"></a>

  <div class="pull-left">
    @include('_partials.social')
  </div>
  <div class="pull-right">
    @include('_partials.language')
    @include('_partials.contact-us')
  </div>
  </div>
</header>

@include('_partials.header.mobile')