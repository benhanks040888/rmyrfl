@extends('admin.layouts.master')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Dashboard</h1>
    </div>
  </div>
  
  <div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-cubes fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$product_count or 0}}</div>
						<div>Products</div>
					</div>
				</div>
			</div>
			<a href="{{URL::route('admin.product')}}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
  </div>
	
@stop