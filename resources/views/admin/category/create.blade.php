@extends('layouts.admin')
@section('title') Thêm mới danh mục @endsection
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{ url('admin') }}"><svg class="glyph stroked home"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="{{ url('admin/category') }}">Danh mục</a></li>
				<li class="active">Thêm mới</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Thêm mới danh mục</h3>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Thêm mới danh mục</div>
					<div class="panel-body">
						<div class="col-md-6">
							
							{!! Form::open(['type' => 'POST', 'url' => 'admin/category', 'role' => 'form']) !!}
								<div class="form-group">
									<label>Title</label>
									<input type="text" class="form-control" placeholder="Mời bạn nhập tên danh mục" name="title">
									{!! $errors->first('title', '<span id="title-error" style="color: red" >:message</span>') !!}
								</div>
								<div class="form-group">
									<label>Status</label>
									<select name="status" class="form-control">
										<option>Mời chọn</option>
										<option value="du lịch trong nước">Du lịch trong nước</option>
										<option value="du lịch nước ngoài">Du lịch nước ngoài</option>
									</select>
								</div>							
								<button type="submit" class="btn btn-primary">Submit</button>
								<button type="reset" class="btn btn-default">Reset</button>
							{!! Form::close() !!}
						</div>
							
								
					
						
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div>
@endsecion