@extends('layouts.admin')
@section('title') Thêm mới thông tin cho thuê xe @endsection
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{ url('admin') }}"><svg class="glyph stroked home"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="{{ url('admin/car_service') }}">Thông tin cho thuê xe</a></li>
				<li class="active">Thêm mới</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Thêm mới thông tin cho thuê xe</h3>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Thêm mới</div>
					<div class="panel-body">
						<div class="col-md-10">
							{!! Form::open(['type'=>'POST', 'url'=>'admin/car_service', 'files' => true, 'role'=>'form']) !!}
							
								@include('admin.car_service.form')

							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
	</div>
@endsection