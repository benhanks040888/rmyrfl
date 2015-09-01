@extends('admin.layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Product - {{$action or "Add"}}</h1>
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
	
	{{ Form::open(array('route' => 'admin.product.submit','class' => 'form-horizontal','files' => true)) }}
	<input type="hidden" name="_action" id="_action" value="{{$formProcess or 'addProcess'}}"/>
	<input type="hidden" name="id" value="{{$input['id'] or 'addProcess'}}"/>
	<div class="form-group">
		<label for="inputNameEn" class="col-sm-2 control-label">Name (EN)</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputNameEn" name="name_en" placeholder="Product Name (EN)" value="{{$input['name_en'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputNameID" class="col-sm-2 control-label">Name (ID)</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputNameID" name="name_id" placeholder="Product Name (ID)" value="{{$input['name_id'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputPrice" class="col-sm-2 control-label">Price</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputPrice" name="price" placeholder="Price" value="{{$input['price'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputMaskedPrice" class="col-sm-2 control-label">Masked Price</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputMaskedPrice" name="masked_price" placeholder="Masked Price (leave blank if none)" value="{{$input['masked_price'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputType" class="col-sm-2 control-label">Product Type</label>
		<div class="col-sm-10">
			{{ Form::select('type', $category, $input['type']) }}
		</div>
	</div>
	<div class="form-group">
		<label for="inputImage" class="col-sm-2 control-label">Image</label>
		<div class="col-sm-10">
			@if(!empty($input['image']))
				<img height="260" src="{{asset($input['image'])}}"/>
			@endif
			<input type="file" name="image" id="inputImage">
			<p><i>Suggested dimension : (free width) x 260</i></p>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-2">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		<div class="col-sm-6">
			<a href="{{URL::route('admin.product')}}"><button type="button" class="btn btn-default">Back</button></a>
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
       onImageUpload: function(files, editor, welEditable) {
         sendFile(files[0], editor, welEditable);
       },
       toolbar: [
         ['style', ['bold', 'italic', 'underline', 'clear']],
         ['font', ['strikethrough']],
         ['fontsize', ['fontsize']],
         ['color', ['color']],
         ['para', ['ul', 'ol', 'paragraph']],
         ['height', ['height']],
         ['table', ['table']],
         ['insert', ['link', 'picture', 'video']],
         ['code', ['codeview', 'undo', 'redo', 'help']]
       ]
     });
     
     function sendFile(file, editor, welEditable) {
       data = new FormData();
       data.append('file', file);
       $.ajax({
         data:  data,
         type: "POST",
         url: "{{ URL::route('admin.product.create-image-ajax') }}",
         cache: false,
         contentType: false,
         processData: false,
         success: function(url) {
           editor.insertImage(welEditable, url);
           // window.alert(url);
         }
       });
	};
</script>
@stop