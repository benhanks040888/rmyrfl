@extends('admin.layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Promo</h2>
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
	
	{{ Form::open(array('route' => 'admin.promo.submit','class' => 'form-horizontal','files' => true)) }}
	<input type="hidden" name="id" value="{{$input['id'] or ''}}"/>
	<div class="form-group">
		<label for="inputTitleID" class="col-sm-2 control-label">Title (ID)</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputTitleID" name="title_id" placeholder="Title (ID)" value="{{$input['title_id'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputContentID" class="col-sm-2 control-label">Content (ID)</label>
		<div class="col-sm-10">
			<textarea type="text" class="form-control wysiwyg" id="content_id" name="content_id" placeholder="Konten Bahasa Indonesia">{{$input['content_id'] or ''}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="inputTitleEN" class="col-sm-2 control-label">Title (EN)</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputTitleEN" name="title_en" placeholder="Title (EN)" value="{{$input['title_en'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputContentEN" class="col-sm-2 control-label">Content (EN)</label>
		<div class="col-sm-10">
			<textarea type="text" class="form-control wysiwyg" id="content_en" name="content_en" placeholder="English Content">{{$input['content_en'] or ''}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="inputImage" class="col-sm-2 control-label">Picture (Optional)</label>
		<div class="col-sm-10">
			@if(!empty($input['picture']))
				<a href="javascript:void(0)" id="delPicture"><img width="200" src="{{asset($input['picture'])}}"/></a>
			@endif
			<input type="file" name="image" id="inputImage">
			<p><i>Suggested dimension : 480 x 480</i></p>
		</div>
	</div>
	<div class="form-group">
		<label for="inputFileName" class="col-sm-2 control-label">File Note</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputFileName" name="file_name" placeholder="Input a short note about the file" value="{{$input['file_name'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputImage" class="col-sm-2 control-label">File</label>
		<div class="col-sm-10">
			@if(!empty($input['file_location']))
				<a href="javascript:void(0)" id="delFile">Delete File</a>
			@endif
			<input type="file" name="file_location" id="inputFile">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-2">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		<div class="col-sm-6">
			<a href="{{URL::route('admin.promo')}}"><button type="button" class="btn btn-default">Back</button></a>
		</div>
	</div>
	{{Form::close()}}
@stop

@section('styles')
<link rel="stylesheet" href="{{assets_url('admin/css/vendors/summernote.css')}}">
@stop

@section('scripts')
<script type="text/javascript" src="{{assets_url('admin/js/vendors/summernote.js')}}"></script>
<script>
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
	 
	$("#delPicture").click(function(){
		if(confirm("Are you sure you want to delete this picture?")){
			$.ajax({
				url: "{{URL::route('admin.promo.remove-picture')}}",  //Server script to process data
				type: 'POST',
				dataType: 'json',
				cache: false,
				success: function(data){
					if(data == 1){
						$("#delPicture").html('');
					}
					else{
						alert('Bad request');
					}
				}
			});
		}
		return false;
	});
	
	$("#delFile").click(function(){
		if(confirm("Are you sure you want to delete this file?")){
			$.ajax({
				url: "{{URL::route('admin.promo.remove-file')}}",  //Server script to process data
				type: 'POST',
				dataType: 'json',
				cache: false,
				success: function(data){
					if(data == 1){
						$("#delFile").html('');
					}
					else{
						alert('Bad request');
					}
				}
			});
		}
		return false;
	});
</script>
@stop