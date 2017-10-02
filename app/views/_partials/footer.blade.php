<div class="footer-menu">
  <div class="container">
    <div class="row footer-menu-main">
      <div class="col-sm-3">
        <h3 class="footer-menu-heading">Corporate Entertainer</h3>
        <ul class="footer-menu-list">
          @foreach ($modelsCe as $slug)

          @if ($slug == "customer")
          <li>
            <a href="{{URL::route('site.entertainer.customer',array('lang'=> Request::segment(1)))}}">{{trans('menu.customer')}}</a>
          </li>
          @endif

          @if ($slug == "work")
          <li>
            <a href="{{URL::route('site.entertainer.work',array('lang'=> Request::segment(1)))}}">{{trans('menu.service')}}</a>
          </li>
          @endif

          @if ($slug == "client")
          <li>
            <a href="{{URL::route('site.entertainer.client',array('lang'=> Request::segment(1)))}}">{{trans('menu.client')}}</a>
          </li>
          @endif

          @if ($slug == "show")
          <li>
            <a href="https://www.youtube.com/playlist?list=PLObURnEFJ80XKwv8eEgbhZCmfzVohEw35" target="_blank">{{trans('menu.show')}}</a>
          </li>
          @endif

          @if ($slug == "produk")
          <li>
            <a href="{{URL::route('site.entertainer.product',array('lang'=> Request::segment(1)))}}">{{trans('menu.menu-product')}}</a>
          </li>
          @endif

          @if ($slug == "free-gift")
          <li>
            <a href="{{URL::route('site.entertainer.gift',array('lang'=> Request::segment(1)))}}">{{trans('menu.menu-gift')}}</a>
          </li>
          @endif

          @if ($slug == "sesi-grup-kecil")
          <li>
            <a href="{{URL::route('site.entertainer.group',array('lang'=> Request::segment(1)))}}">{{trans('menu.menu-group')}}</a>
          </li>
          @endif

          @if ($slug == "associate-coach-and-team")
          <li>
            <a href="{{URL::route('site.entertainer.association',array('lang'=> Request::segment(1)))}}">{{trans('menu.menu-association')}}</a>
          </li>
          @endif

          @endforeach
        </ul>
      </div>
      <div class="col-sm-3">
        <h3 class="footer-menu-heading">Corporate Speaker</h3>
        <ul class="footer-menu-list">
          @foreach ($modelsCs as $slug)

          @if($slug == "customer")
          <li>
            <a href="{{URL::route('site.speaker.customer',array('lang'=> Request::segment(1)))}}">{{trans('menu.customer')}}</a>
          </li>
          @endif

          @if($slug == "work")
          <li>
            <a href="{{URL::route('site.speaker.work',array('lang'=> Request::segment(1)))}}">{{trans('menu.service')}}</a>
          </li>
          @endif

          @if($slug == "client")
          <li>
            <a href="{{URL::route('site.speaker.client',array('lang'=> Request::segment(1)))}}">{{trans('menu.client')}}</a>
          </li>
          @endif

          @if($slug == "training")
          <li>
            <a href="{{URL::route('site.speaker.training',array('lang'=> Request::segment(1)))}}">{{trans('menu.training')}}</a>
          </li>
          @endif

          @if ($slug == "produk")
          <li>
            <a href="{{URL::route('site.speaker.product',array('lang'=> Request::segment(1)))}}">{{trans('menu.menu-product')}}</a>
          </li>
          @endif

          @if ($slug == "free-gift")
          <li>
            <a href="{{URL::route('site.speaker.gift',array('lang'=> Request::segment(1)))}}">{{trans('menu.menu-gift')}}</a>
          </li>
          @endif

          @if ($slug == "sesi-grup-kecil")
          <li>
            <a href="{{URL::route('site.speaker.group',array('lang'=> Request::segment(1)))}}">{{trans('menu.menu-group')}}</a>
          </li>
          @endif

          @if ($slug == "associate-coach-and-team")
          <li>
            <a href="{{URL::route('site.speaker.association',array('lang'=> Request::segment(1)))}}">{{trans('menu.menu-association')}}</a>
          </li>
          @endif

          @endforeach
        </ul>
      </div>
      <div class="col-sm-3">
        <h3 class="footer-menu-heading">One on One Coaching & Mentoring</h3>
        <ul class="footer-menu-list">
          @foreach ($modelsCt as $slug)

          @if ($slug == "customer")
          <li>
            <a href="{{URL::route('site.therapist.customer',array('lang'=> Request::segment(1)))}}">{{trans('menu.customer')}}</a>
          </li>
          @endif

          @if ($slug == "layanan")
          <li>
            <a href="{{URL::route('site.therapist.service',array('lang'=> Request::segment(1)))}}">{{trans('menu.service')}}</a>
          </li>
          @endif

          @if ($slug == "cara-kerja-kami")
          <li>
            <a href="{{URL::route('site.therapist.training',array('lang'=> Request::segment(1)))}}">{{trans('menu.one-how-we-work')}}</a>
          </li>
          @endif

          @if ($slug == "therapy-case-study")
          <li>
            <a href="{{URL::route('site.therapist.group-therapy',array('lang'=> Request::segment(1)))}}">{{trans('menu.therapy-group')}}</a>
          </li>
          @endif

          @if ($slug == "personal-therapy")
          <li>
            <a href="{{URL::route('site.therapist.personal-therapy',array('lang'=> Request::segment(1)))}}">{{trans('menu.therapy-personal')}}</a>
          </li>
          @endif

          @if ($slug == "association")
          <li>
            <a href="{{URL::route('site.therapist.association',array('lang'=> Request::segment(1)))}}">{{trans('menu.therapist-association')}}</a>
          </li>
          @endif

          @if ($slug == "produk")
          <li>
            <a href="{{URL::route('site.therapist.product',array('lang'=> Request::segment(1)))}}">{{trans('menu.menu-product')}}</a>
          </li>
          @endif

          @if ($slug == "free-gift")
          <li>
            <a href="{{URL::route('site.therapist.gift',array('lang'=> Request::segment(1)))}}">{{trans('menu.menu-gift')}}</a>
          </li>
          @endif

          @if ($slug == "sesi-grup-kecil")
          <li>
            <a href="{{URL::route('site.therapist.group',array('lang'=> Request::segment(1)))}}">{{trans('menu.menu-group')}}</a>
          </li>
          @endif

          @if ($slug == "associate-coach-and-team")
          <li>
            <a href="{{URL::route('site.therapist.associationcoach',array('lang'=> Request::segment(1)))}}">{{trans('menu.menu-association')}}</a>
          </li>
          @endif
          @endforeach
        </ul>
      </div>
      <div class="col-sm-3">
        <h3 class="footer-menu-heading">Corporate Entertainer</h3>
        <ul class="footer-menu-list">
          <li>Romy Rafael Hypnotherapy Center</li>
          <li>Contact : +62.81.282.111.869, +62.87.882.330.696, +62.81.212.127.212</li>
          <li>Email : <a href="mailto:info@romyrafael.com">info@romyrafael.com</a>, <a href="mailto:romyrafaelmind@gmail.com">romyrafaelmind@gmail.com</a></li>
        </ul>

        @include('_partials.social')
      </div>
    </div>

    <div class="footer-menu-other">
      <a href="{{URL::route('site.about',array('lang'=> Request::segment(1)))}}">{{trans('menu.about')}} Romy Rafael</a>
      <span class="footer-menu-separator">|</span>
      <a href="{{URL::route('site.affirmation',array('lang'=> Request::segment(1)))}}">{{trans('menu.affirmation')}}</a>
      <span class="footer-menu-separator">|</span>
      <a href="{{URL::route('site.product',array('lang'=> Request::segment(1)))}}">{{trans('menu.product')}}</a>
      <span class="footer-menu-separator">|</span>
      <a href="{{URL::route('site.imaji',array('lang'=> Request::segment(1)))}}">Lintas Imaji (NET)</a>
    </div>
  </div>
</div>
<footer class="footer">
  <div class="container">
    Copyright © 2015 by Romy Rafael Hypnotherapy - All Rights Reserved
  </div>
</footer>