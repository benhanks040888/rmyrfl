<div class="footer-menu">
  <div class="container">
    <div class="row footer-menu-main">
      <div class="col-sm-3">
        <h3 class="footer-menu-heading">Corporate Entertainer</h3>
        <ul class="footer-menu-list">
          <li><a href="{{URL::route('site.entertainer.customer',array('lang'=> Request::segment(1)))}}">{{trans('menu.customer')}}</a></li>
          <li><a href="{{URL::route('site.entertainer.work',array('lang'=> Request::segment(1)))}}">{{trans('menu.service')}}</a></li>
          <li><a href="{{URL::route('site.entertainer.client',array('lang'=> Request::segment(1)))}}">{{trans('menu.client')}}</a></li>
          <li><a href="{{URL::route('site.entertainer.show',array('lang'=> Request::segment(1)))}}">{{trans('menu.show')}}</a></li>
        </ul>
      </div>
      <div class="col-sm-3">
        <h3 class="footer-menu-heading">Corporate Speaker</h3>
        <ul class="footer-menu-list">
          <li><a href="{{URL::route('site.speaker.customer',array('lang'=> Request::segment(1)))}}">{{trans('menu.customer')}}</a></li>
          <li><a href="{{URL::route('site.speaker.work',array('lang'=> Request::segment(1)))}}">{{trans('menu.service')}}</a></li>
          <li><a href="{{URL::route('site.speaker.client',array('lang'=> Request::segment(1)))}}">{{trans('menu.client')}}</a></li>
          <li><a href="{{URL::route('site.speaker.training',array('lang'=> Request::segment(1)))}}">{{trans('menu.training')}}</a></li>
        </ul>
      </div>
      <div class="col-sm-3">
        <h3 class="footer-menu-heading">Certified Therapist</h3>
        <ul class="footer-menu-list">
          <li><a href="{{URL::route('site.therapist.customer',array('lang'=> Request::segment(1)))}}">{{trans('menu.customer')}}</a></li>
          <li><a href="{{URL::route('site.therapist.work',array('lang'=> Request::segment(1)))}}">{{trans('menu.service')}}</a></li>
          <li><a href="{{URL::route('site.therapist.training',array('lang'=> Request::segment(1)))}}">{{trans('menu.training')}}</a></li>
          <li><a href="{{URL::route('site.therapist.group-therapy',array('lang'=> Request::segment(1)))}}">{{trans('menu.therapy-group')}}</a></li>
          <li><a href="{{URL::route('site.therapist.personal-therapy',array('lang'=> Request::segment(1)))}}">{{trans('menu.therapy-personal')}}</a></li>
          <li><a href="{{URL::route('site.therapist.association',array('lang'=> Request::segment(1)))}}">{{trans('menu.therapist-association')}}</a></li>
        </ul>
      </div>
      <div class="col-sm-3">
        <h3 class="footer-menu-heading">Corporate Entertainer</h3>
        <ul class="footer-menu-list">
          <li>Romy Rafael Hypnotherapy Center</li>
          <li>Contact : 0818 399124, 0819 32433457</li>
          <li>Email : <a href="#">info@romyrafael.net</a></li>
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