	@if($errors->first())
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3 bg-danger text-center text-danger">
			<strong>{{$errors->first()}}</strong>
		</div>
	</div>
	<hr/>
	@elseif(Session::get('success'))
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3 bg-info text-center text-info">
			<strong>{{Session::get('success')}}</strong>
		</div>
	</div>
	<hr/>
	@elseif(Session::get('error_message'))
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3 bg-danger text-center text-danger">
			<strong>{{Session::get('error_message')}}</strong>
		</div>
	</div>
	<hr/>
	@endif