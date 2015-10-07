<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    @include('_partials.head')
  </head>
  <body>
    <div class="page--splash">
      @include('_partials.header.simple')
		
      <div class="clearfix splash-row">
        <a href="{{URL::route('site.entertainer.home',array('lang'=> Request::segment(1)))}}" class="splash-col">
          <div class="splash-overlay"></div>
          <div class="splash-image" style="background-image:url({{assets_url('images/home/corporate-entertainer.jpg')}})"></div>
          <div class="splash-text">
            <div class="vcenter">
              <h1>Corporate Entertainer</h1>
              <p>Let me help you to create a show you never imagine before</p>
        
              <span href="{{URL::route('site.entertainer.home',array('lang'=> Request::segment(1)))}}" class="btn btn-primary">See More</span>
            </div>
          </div>
        </a>
        
        <a href="{{URL::route('site.speaker.home',array('lang'=> Request::segment(1)))}}" class="splash-col">
          <div class="splash-overlay"></div>
          <div class="splash-image" style="background-image:url({{assets_url('images/home/corporate-speaker.jpg')}})"></div>
          <div class="splash-text">
            <div class="vcenter">
              <h1>Corporate Speaker</h1>
              <p>Let me help you to create a show you never imagine before</p>
        
              <span href="{{URL::route('site.speaker.home',array('lang'=> Request::segment(1)))}}" class="btn btn-primary">See More</span>
            </div>
          </div>
        </a>
        
        <a href="{{URL::route('site.therapist.home',array('lang'=> Request::segment(1)))}}" class="splash-col">
          <div class="splash-overlay"></div>
          <div class="splash-image" style="background-image:url({{assets_url('images/home/certified-therapist.jpg')}})"></div>
          <div class="splash-text">
            <div class="vcenter">
              <h1>Certified Therapist</h1>
              <p>Let me help you to create a show you never imagine before</p>
        
              <span href="{{URL::route('site.therapist.home',array('lang'=> Request::segment(1)))}}" class="btn btn-primary">See More</span>
            </div>
          </div>
        </a>
        
      </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{assets_url('js/vendors/jquery-1.11.0.min.js')}}"><\/script>')</script>
    <script src="{{assets_url('js/vendors/bootstrap.min.js')}}"></script>
    <script src="{{assets_url('js/site.min.js')}}"></script>
  </body>
</html>