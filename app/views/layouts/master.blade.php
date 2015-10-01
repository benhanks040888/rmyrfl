<!doctype html>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
  <head>
        @include('_partials.head')
  </head>
  <body class="home">

    <div id="fb-root"></div>
	
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId: '{{ Config::get("facebook.appId") }}',
          status: true,
          cookie: true,
          xfbml: true,
          oauth: true,
          version: 'v2.0'
        });
      };

      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

    @include('_partials.header.index')
    
    @yield('content')

    @include('_partials.footer')

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ str_replace('/', '\/', assets_url('js/vendors/jquery-1.11.0.min.js')) }}"><\/script>')</script>

    <script src="{{ assets_url('js/vendors/bootstrap.min.js') }}"></script>
    <script src="{{ assets_url('js/site.min.js') }}?v={{ filemtime(public_path() . '/assets/js/site.min.js') }}"></script>

    @yield('scripts')

  </body>
</html>