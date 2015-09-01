@extends('admin.layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Imaji - {{$action or "Add"}}</h1>
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
	
	{{ Form::open(array('route' => 'admin.imaji.submit','class' => 'form-horizontal','files' => true)) }}
	<input type="hidden" name="_action" id="_action" value="{{$formProcess or 'addProcess'}}"/>
	<input type="hidden" name="id" value="{{$input['id'] or 'addProcess'}}"/>
	<div class="form-group">
		<label for="inputTitle" class="col-sm-2 control-label">Title</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputTitle" name="title" placeholder="Video Title" value="{{$input['title'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputYoutube" class="col-sm-2 control-label">Youtube Video ID</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputYoutube" name="youtube_id" placeholder="Youtube Video ID" value="{{$input['youtube_id'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="description" class="col-sm-2 control-label">Description</label>
		<div class="col-sm-10">
			<textarea type="text" class="form-control wysiwyg" id="txtDescription" name="description" placeholder="Video Description">{{$input['description'] or ''}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-2">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		<div class="col-sm-6">
			<a href="{{URL::route('admin.imaji')}}"><button type="button" class="btn btn-default">Back</button></a>
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