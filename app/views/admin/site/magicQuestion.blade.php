@extends('admin.layouts.master')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Magic Question</h1>
    </div>
  </div>

	
	@if(!$result)
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3 bg-info text-center text-info">
				<strong>There's no question submitted yet</strong><br/>
				<a href="{{URL::route('admin.magic-question.edit')}}">click here to create question</a>
			</div>
		</div>
	@else
		{{ Form::open(array('class' => 'form-horizontal')) }}
		<div class="form-group bg-warning">
			<label class="col-sm-2 ">Question (ID)</label>
			<div class="col-sm-10">
				{{$result['question_id'] or ''}}
			</div>
		</div>
		<div class="form-group bg-info">
			<label class="col-sm-2">Answer (ID)</label>
			<div class="col-sm-10">
				{{$result['answer_id'] or ''}}
			</div>
		</div>
		<hr/>
		<div class="form-group bg-warning">
			<label class="col-sm-2">Question (EN)</label>
			<div class="col-sm-10">
				{{$result['question_en'] or ''}}
			</div>
		</div>
		<div class="form-group bg-info">
			<label class="col-sm-2">Answer (EN)</label>
			<div class="col-sm-10">
				{{$result['answer_en'] or ''}}
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
			<div class="col-sm-offset-2 col-sm-6">
				<a href="{{URL::route('admin.magic-question.edit')}}"><button type="button" class="btn btn-default">Edit</button></a>
			</div>
		</div>
		{{Form::close()}}
	@endif
@stop
	
@section('scripts')
@stop