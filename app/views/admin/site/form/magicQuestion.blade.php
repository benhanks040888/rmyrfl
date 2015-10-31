@extends('admin.layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Magic Question</h2>
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
	
	{{ Form::open(array('route' => 'admin.magic-question.submit','class' => 'form-horizontal','files' => true)) }}
	<input type="hidden" name="id" value="{{$input['id'] or ''}}"/>
	<div class="form-group">
		<label for="inputQuestionID" class="col-sm-2 control-label">Question (ID)</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputQuestionID" name="question_id" placeholder="Question (ID)" value="{{$input['question_id'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputAnswerID" class="col-sm-2 control-label">Answer (ID)</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputAnswerID" name="answer_id" placeholder="Answer (ID)" value="{{$input['answer_id'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputQuestionEN" class="col-sm-2 control-label">Question (EN)</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputQuestionEN" name="question_en" placeholder="Question (EN)" value="{{$input['question_en'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputAnswerEN" class="col-sm-2 control-label">Answer (EN)</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputAnswerEN" name="answer_en" placeholder="Answer (EN)" value="{{$input['answer_en'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputImage" class="col-sm-2 control-label">Picture (Optional)</label>
		<div class="col-sm-10">
			@if(!empty($input['picture']))
				<a href="javascript:void(0)" id="delPicture"><img width="200" src="{{asset($input['picture'])}}"/></a>
			@endif
			<input type="file" name="image" id="inputImage">
			<p><i>Suggested dimension : 240 x 240</i></p>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-2">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		<div class="col-sm-6">
			<a href="{{URL::route('admin.magic-question')}}"><button type="button" class="btn btn-default">Back</button></a>
		</div>
	</div>
	{{Form::close()}}
@stop

@section('scripts')
<script>
	$("#delPicture").click(function(){
		if(confirm("Are you sure you want to delete this picture?")){
			$.ajax({
				url: "{{URL::route('admin.magic-question.remove-picture')}}",  //Server script to process data
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
</script>
@stop