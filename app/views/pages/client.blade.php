@extends('layouts.master')

@section('content')
<section class="section section-main">
  <div class="container">
	<h1 class="section-heading">{{trans('client.our-client')}}</h1>
	<div class="section-content">
	  <div class="clients-list clients-slider js-clients-slider-alt">
		@foreach($clients as $client)
		<div class="client-cell"><div class="client-thumbnail"><img src="{{URL::to($client->logo)}}" alt="{{$client->name}}"></div></div>
		@endforeach
	  </div>
	</div>
  </div>
</section>
<section class="section section-light">
  <div class="container">
	<h2 class="section-heading">{{trans('client.say')}}</h2>
	<div class="section-content">
	  <div class="row">
		@foreach($testimony as $test)
		<div class="col-sm-6">
		  <div class="testimonial-item">
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
			<div class="testimonial-content">
			  {{$test->content}}
			</div>
		  </div>
		</div>
		@endforeach
	  </div>
	</div>
  </div>
</section>
@stop

@section('scripts')
@stop

@section('styles')
@stop