@extends('layouts.admin')
@section('title') Edit "{{ $details->title }}" thông tin @endsection
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{ url('admin') }}"><svg class="glyph stroked home"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="{{ url('admin/details') }}">Thông tin chi tiết</a></li>
				<li class="active">Edit</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Edit "{{ $details->title }}"</h3>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Chỉnh sửa thông tin du lịch</div>
					<div class="panel-body">
						<div class="col-md-10">
							
							{!! Form::model($details,['method' => 'PATCH', 'url' => ['admin/details',$details->id ], 'files' => true ,'role' => 'form']) !!}
								@include('admin.details.form')
							{!! Form::close() !!}
						</div>
							
								
					
						
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div>
@endsecion