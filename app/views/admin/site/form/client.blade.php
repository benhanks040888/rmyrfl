@extends('admin.layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Client - {{$action or "Add"}}</h1>
		</div>
	</div>
	@if($errors->first())
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3 bg-danger text-center text-danger">
			<strong class="">{{$errors->first()}}</strong>
		</div>
	</div>
	<hr/>
	@endif
	<form class="form-horizontal" action="{{URL::route('admin.client.submit',array('url_cat'=> $category))}}" enctype="multipart/form-data" method="POST">
	{{Form::token()}}
	<input type="hidden" name="_action" id="_action" value="{{$formProcess or 'addProcess'}}"/>
	<input type="hidden" name="id" value="{{$input['id'] or 'addProcess'}}"/>
	<input type="hidden" name="category" value="{{$category or 'entertainer'}}"/>
	<div class="form-group">
		<label for="inputName" class="col-sm-2 control-label">Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputName" name="name" placeholder="Client Name" value="{{$input['name'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputImage" class="col-sm-2 control-label">Logo</label>
		<div class="col-sm-10">
			@if(!empty($input['logo']))
				<img width="200" src="{{asset($input['logo'])}}"/>
			@endif
			<input type="file" name="image" id="inputImage">
			<p><i>Suggested dimension : 480 x 480</i></p>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-2">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		<div class="col-sm-6">
			<a href="{{URL::route('admin.client',array($category))}}"><button type="button" class="btn btn-default">Back</button></a>
		</div>
	</div>
	{{Form::close()}}
@stop