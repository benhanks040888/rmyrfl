@extends('admin.layouts.master')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">General Info </h1>
    </div>
  </div>
  <hr/>
	
	<div class="table-responsive">
		<table class="table table-hover datatable">
			<thead>
				<tr>
					<th>Section</th>
				</tr>
			</thead>
			<tbody>
				@foreach($section as $string)
				<tr><td><a href="{{URL::route('admin.general.edit',$string->key)}}">{{$string->title_id}}</a></td></tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop
	
@section('scripts')
@stop