@extends('admin.layouts.master')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">General Info </h1>
    </div>
  </div>
  
	<div class="table-responsive">
		@foreach($section as $section => $string)
		<table class="table table-hover datatable">
			<thead>
				<tr><th>{{$section}}</th></tr>
			</thead>
			<tbody>
				@foreach($string as $string)
				<tr><td><a href="{{URL::route('admin.general.edit',$string->key)}}">{{$string->title_id}} / {{$string->title_en}}</a></td></tr>
				@endforeach
			</tbody>
		</table>
		@endforeach
	</div>
@stop
	
@section('scripts')
@stop