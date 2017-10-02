<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0">
<title>{{$pageTitle or 'Romy Rafael'}} | {{Config::get('site.title')}}</title>
<meta name="description" content="{{$pageDescription or Config::get('site.description')}}">

@section('twitter_meta')
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="" />
@show

@section('og')
<meta property="fb:app_id" content="{{ Config::get('facebook.appId') }}" />
<meta property="og:site_name" content="{{ Config::get('site.name') }}" /> 
<meta property="og:url" content="{{ URL::current() }}" /> 
<meta property="og:title" content="@yield('og:title', Config::get('site.title'))" /> 
<meta property="og:description" content="@yield('description', Config::get('site.description'))" /> 
<meta property="og:image" content="@yield('og:image', Config::get('site.default_image') )" />
@show

<link rel="canonical" href="{{ URL::current() }}">
<link rel="alternate" hreflang="en-US" href="{{URL::to(getHereWithLang('en'))}}" />
<link rel="alternate" hreflang="id" href="{{URL::to(getHereWithLang('id'))}}" />

<meta name="base_url" content="{{ URL::to('/') }}">
<meta name="_token" content="{{ csrf_token() }}" />

<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

<!-- 
<link rel="apple-touch-icon" sizes="57x57" href="{{ assets_url('images/favicons/apple-touch-icon-57x57.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ assets_url('images/favicons/apple-touch-icon-60x60.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ assets_url('images/favicons/apple-touch-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ assets_url('images/favicons/apple-touch-icon-76x76.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ assets_url('images/favicons/apple-touch-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ assets_url('images/favicons/apple-touch-icon-120x120.png') }}">
<link rel="icon" type="image/png" href="{{ assets_url('images/favicons/favicon-32x32.png') }}" sizes="32x32">
<link rel="icon" type="image/png" href="{{ assets_url('images/favicons/favicon-96x96.png') }}" sizes="96x96">
<link rel="icon" type="image/png" href="{{ assets_url('images/favicons/favicon-16x16.png') }}" sizes="16x16">
 -->

<link rel="stylesheet" href="{{ assets_url('css/vendors/bootstrap/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ assets_url('css/site.prefixed.min.css') }}?v={{ filemtime(public_path() . '/assets/css/site.prefixed.min.css') }}">

@yield('styles')

<link rel="author" href="{{ asset('humans.txt') }}">

<script>
  window.base_url = '{{ URL::to('/') }}';
</script>