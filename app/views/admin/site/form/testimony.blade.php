@extends('admin.layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Testimony - {{$action or "Add"}}</h1>
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
	
	{{ Form::open(array('route' => 'admin.testimony.submit','class' => 'form-horizontal','files' => true)) }}
	<input type="hidden" name="_action" id="_action" value="{{$formProcess or 'addProcess'}}"/>
	<input type="hidden" name="id" value="{{$input['id'] or 'addProcess'}}"/>
	<input type="hidden" name="category" value="{{$category or 'entertainer'}}"/>
	<div class="form-group">
		<label for="inputName" class="col-sm-2 control-label">Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputName" name="name" placeholder="Name" value="{{$input['name'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputPosition" class="col-sm-2 control-label">Position</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputPosition" name="position" placeholder="Position" value="{{$input['position'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputImage" class="col-sm-2 control-label">Photo</label>
		<div class="col-sm-10">
			@if(!empty($input['photo']))
				<img width="200" src="{{asset($input['photo'])}}"/>
			@endif
			<input type="file" name="image" id="inputImage">
			<p><i>Suggested dimension : 480 x 480</i></p>
		</div>
	</div>
	<div class="form-group">
		<label for="content_id" class="col-sm-2 control-label">Bahasa Indonesia</label>
		<div class="col-sm-10">
			<textarea type="text" class="form-control wysiwyg" id="content_id" name="content_id" placeholder="Konten Bahasa Indonesia">{{$input['content_id'] or ''}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="content_en" class="col-sm-2 control-label">English</label>
		<div class="col-sm-10">
			<textarea type="text" class="form-control wysiwyg" id="content_en" name="content_en" placeholder="English Content">{{$input['content_en'] or ''}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-2">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		<div class="col-sm-6">
			<a href="{{URL::route('admin.testimony',array($category))}}"><button type="button" class="btn btn-default">Back</button></a>
		</div>
	</div>
	{{Form::close()}}
@stop

@section('styles')
<link rel="stylesheet" href="{{assets_url('admin/css/vendors/summernote.css')}}">
@stop

@section('scripts')
<script type="text/javascript" src="{{assets_url('admin/js/vendors/summernote.js')}}"></script>
<script type="text/javascript">
	$('.wysiwyg').summernote({
       height: 200,
       styleWithSpan: false,
       toolbar: [
         ['style', ['bold', 'italic', 'underline', 'clear']],
         ['font', ['strikethrough']],
         ['fontsize', ['fontsize']],
         ['color', ['color']],
         ['para', ['ul', 'ol', 'paragraph']],
         ['height', ['height']],
         ['table', ['table']],
         ['insert', ['link']],
         ['code', ['codeview', 'undo', 'redo', 'help']]
       ]
     });
     
</script>

@stop