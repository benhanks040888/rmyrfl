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
		<label for="inputPromo" class="col-sm-2 control-label">Is a Promo?</label>
		<div class="col-sm-10">
			{{Form::checkbox('is_promo', 1, $input['is_promo'], array('id'=>'chkPromo'))}}
		</div>
	</div>
	<div class="form-group">
		<label for="inputPromoLabelEN" class="col-sm-2 control-label">Promo Label (EN)</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputPromoLabelEN" name="promo_label_en" placeholder="Promo Label (EN)" value="{{$input['promo_label_en'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputPromoLabelID" class="col-sm-2 control-label">Promo Label (ID)</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputPromoLabelID" name="promo_label_id" placeholder="Promo Label (ID)" value="{{$input['promo_label_id'] or ''}}">
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
	$("#chkPromo").change(function(){
		if($(this).prop('checked')){
			$("#inputPromoLabelEN,#inputPromoLabelID").css({
				'border': '2px solid red'
			});
			$("#inputPromoLabelEN").focus();
		}
		else{
			$("#inputPromoLabelEN,#inputPromoLabelID").css({
				'border': 'default'
			});
		}
	});
</script>
@stop