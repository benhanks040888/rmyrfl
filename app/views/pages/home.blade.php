@extends('layouts.master')

@section('content')
<section class="section section-slider section-{{ $pageType }}-slider">
  <div class="container">
    <div class="testimonial-slider">
	@foreach($testimony as $test)
      <div class="testimonial-cell">
        <div class="testimonial-item-slider">
          <div class="testimonial-content">
            {{$test->content}}
          </div>
          <div class="testimonial-person">
            <div class="testimonial-person-image">
              <img src="{{URL::to($test->photo)}}" alt="{{$test->name}}">
            </div>
            <div class="testimonial-person-info">
              <div class="vcenter">
                <h3 class="testimonial-person-name">{{$test->name}}</h3>
                <h4 class="testimonial-person-job">{{$test->position}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    </div>
  </div>
</section>
    <section class="section section-main">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <h1 class="section-heading tt-normal">Apakah Anda mencari entertainer profesional yang dapat menyampaikan pesan dari produk dan jasa Anda?</h1>
            <div class="section-content">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="//www.youtube.com/embed/4iEOCG37fq0"></iframe>
                
              </div>
            </div><a href="{{$link['customer']}}" class="btn btn-primary">{{trans('home.customer')}}</a>
          </div>
        </div>
      </div>
    </section>
    <section class="section section-dark">
      <div class="container">
        <h2 class="section-heading">{{trans('menu.work')}}</h2>
        <div class="section-content">
          {{$work}}
        </div><a href="{{$link['work']}}" class="btn btn-primary">{{trans('home.service')}}</a>
      </div>
    </section>
    <section class="section section-gray">
      <div class="container">
        <h1 class="section-heading">{{trans('home.part-client')}}</h1>
        <div class="section-content">
          <div class="clients-list clients-slider js-clients-list">
            @foreach($clients as $client)
			<div class="client-cell"><div class="client-thumbnail"><img src="{{URL::to($client->logo)}}" alt="{{$client->name}}"></div></div>
            @endforeach
          </div>
        </div><a href="{{$link['client']}}" class="btn btn-primary">{{trans('home.all-client')}}</a>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <h1 class="section-heading tt-normal">{{trans('home.show-imaji')}}</h1>
        <div class="section-content">
          <div class="row">
			@foreach($imaji as $video)
            <div class="col-xs-6 col-sm-3">
              <a href="//www.youtube.com/watch?v={{$video->youtube_id}}" class="video-item js-popup-youtube">
                <img class="img-responsive" src="http://img.youtube.com/vi/{{$video->youtube_id}}/maxresdefault.jpg" />
              </a>
            </div>
			@endforeach
          </div>
        </div><a href="{{URL::route('site.imaji',array('lang'=> Request::segment(1)))}}" class="btn btn-primary">{{trans('home.all-episode')}}</a>
      </div>
    </section>
@stop

@section('scripts')
@stop

@section('styles')
@stop