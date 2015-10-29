@extends('admin.layouts.master')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Promo</h1>
    </div>
  </div>
	
	@if(!$result)
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3 bg-info text-center text-info">
				<strong>There's no promo submitted yet</strong><br/>
				<a href="{{URL::route('admin.promo.edit')}}">click here to create promo</a>
			</div>
		</div>
	@else
		{{ Form::open(array('class' => 'form-horizontal')) }}
		<div class="form-group bg-warning">
			<label class="col-sm-2 ">Title (ID)</label>
			<div class="col-sm-10">
				{{$result['title_id'] or ''}}
			</div>
		</div>
		<div class="form-group bg-info">
			<label class="col-sm-2">Content (ID)</label>
			<div class="col-sm-10">
				{{$result['content_id'] or ''}}
			</div>
		</div>
		<hr/>
		<div class="form-group bg-warning">
			<label class="col-sm-2">Title (EN)</label>
			<div class="col-sm-10">
				{{$result['title_en'] or ''}}
			</div>
		</div>
		<div class="form-group bg-info">
			<label class="col-sm-2">Content (EN)</label>
			<div class="col-sm-10">
				{{$result['content_en'] or ''}}
			</div>
		</div>
		<hr/>
		<div class="form-group">
			<label class="col-sm-2">Picture</label>
			<div class="col-sm-10">
				@if(!empty($result['picture']))
				<img width="200" src="{{asset($result['picture'])}}"/>
				@else
				<p>Picture not available</p>
				@endif
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2">Active</label>
			<div class="col-sm-10">
				<span id="txtActive">
				@if($result['active'])
					Yes
				@else
					No
				@endif
				</span>
				 -- <a href="javascript:void(0)" onClick="changeAccept({{$result['id']}})">Change</a>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-6">
				<a href="{{URL::route('admin.promo.edit')}}"><button type="button" class="btn btn-default">Edit</button></a>
			</div>
		</div>
		{{Form::close()}}
	@endif
@stop
	
@section('scripts')
<script>
	function changeAccept(id){
			$.ajax({
					url: "{{URL::route('admin.promo.switch-active')}}",  //Server script to process data
					type: 'POST',
					dataType: 'json',
					//Ajax events
					//error: errorHandler,
					// Form data
					data: "id="+id,
					//Options to tell jQuery not to process data or worry about content-type.
					cache: false,
					//contentType: false,
					//processData: false,
					success: function(data){
						if(data == 1){
							if($("#txtActive").html()==="Yes")
								$("#txtActive").html("No");
							else
								$("#txtActive").html("Yes");
						}
						else{
							alert('Bad request');
						}
					}
				});
			return false;
		}
</script>
@stop