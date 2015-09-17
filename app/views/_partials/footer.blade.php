<div class="footer-menu">
  <div class="container">
    <div class="row footer-menu-main">
      <div class="col-sm-3">
        <h3 class="footer-menu-heading">Corporate Entertainer</h3>
        <ul class="footer-menu-list">
          <li><a href="#">{{trans('menu.customer')}}</a></li>
          <li><a href="#">{{trans('menu.service')}}</a></li>
          <li><a href="{{URL::route('site.entertainer.client',array('lang'=> Request::segment(1)))}}">{{trans('menu.client')}}</a></li>
          <li><a href="#">Jenis show</a></li>
        </ul>
      </div>
      <div class="col-sm-3">
        <h3 class="footer-menu-heading">Corporate Speaker</h3>
        <ul class="footer-menu-list">
          <li><a href="#">{{trans('menu.customer')}}</a></li>
          <li><a href="#">{{trans('menu.service')}}</a></li>
          <li><a href="#">{{trans('menu.client')}}</a></li>
          <li><a href="#">{{trans('menu.training')}}</a></li>
        </ul>
      </div>
      <div class="col-sm-3">
        <h3 class="footer-menu-heading">Certified Therapist</h3>
        <ul class="footer-menu-list">
          <li><a href="#">{{trans('menu.customer')}}</a></li>
          <li><a href="#">{{trans('menu.service')}}</a></li>
          <li><a href="#">Jenis show</a></li>
          <li><a href="#">Sesi Terapi Kelompok</a></li>
          <li><a href="#">Sesi Terapi Perorangan</a></li>
          <li><a href="#">Asosiasi Terapis Kami</a></li>
        </ul>
      </div>
      <div class="col-sm-3">
        <h3 class="footer-menu-heading">Corporate Entertainer</h3>
        <ul class="footer-menu-list">
          <li>Romy Rafael Hypnotherapy Center</li>
          <li>Contact : 0818 399124, 0819 32433457</li>
          <li>Email : <a href="#">info@romyrafael.net</a></li>
        </ul>

        <div class="social-links">
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-youtube"></i></a>
          <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
      </div>
    </div>

    <div class="footer-menu-other">
      <a href="{{URL::route('site.about',array('lang'=> Request::segment(1)))}}">{{trans('menu.about')}} Romy Rafael</a>
      <span class="footer-menu-separator">|</span>
      <a href="#">{{trans('menu.affirmation')}}</a>
      <span class="footer-menu-separator">|</span>
      <a href="{{URL::route('site.product',array('lang'=> Request::segment(1)))}}">{{trans('menu.product')}}</a>
      <span class="footer-menu-separator">|</span>
      <a href="#">Lintas Imaji (NET)</a>
    </div>
  </div>
</div>
<footer class="footer">
  <div class="container">
    Copyright © 2015 by Romy Rafael Hypnotherapy - All Rights Reserved
  </div>
</footer>