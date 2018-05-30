@extends('layouts.admin')
@section('title') Thông tin du lịch @endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{ url('admin') }}"><svg class="glyph stroked home"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Thông tin</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Thông tin du lịch</h3>
			</div>
		</div><!--/.row-->
		@if(Session::has('success'))
		<div class="row">
			<div class="col-lg-12">
				<div class="alert bg-success" role="alert">
					<svg class="glyph stroked checkmark"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-checkmark"></use></svg> 
					{{ Session::get('success') }}
					<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>
			</div>
		</div>
		@endif
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Thông tin các tour</div>
					<div class="pull-right search" style="margin: 10px 0 10px 0;">
						{!! Form::open(['method' => 'GET', 'url' => 'admin/details']) !!}
						<input class="form-control" type="text" name="keyword" placeholder="Mời bạn nhập từ cần tìm kiếm" style="border: 1px solid #000; width: 400px; float: left; " 
						@if(Request::has('keyword'))
							value="{{ Request::get('keyword') }}"
						@endif>
						<input type="submit" name="" value="Search" style="height: 32px; margin: 0 30px 0 20px; border-radius: 15px;">
						{!! Form::close() !!}
					</div>
								
					<div class="panel-body">
						<a href="{{ url('admin/details/create') }}">Thêm mới</a>
						<div class="bootstrap-table">
								
								<div class="fixed-table-container">

									<div class="fixed-table-header">
										<table></table>
									</div>

									<div class="fixed-table-body">
										<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover">
						    			<thead>
						    			<tr>
						    				<th class="bs-checkbox " style="width: 36px; ">
						    					<div class="th-inner ">
						    						<input name="btSelectAll" type="checkbox">
						    					</div>
						    					<div class="fht-cell"></div>
						    				</th>
						    				<th style="text-align:center;">
						    					<div class="th-inner sortable">STT</div>
						    					<div class="fht-cell"></div>
						    				</th>
						    				<th style="text-align:center; width: 150px; ">
						    					<div class="th-inner sortable">Ảnh</div>
						    					<div class="fht-cell"></div>
						    				</th>
						    				<th style="text-align:center; width: 400px; ">
						    					<div class="th-inner sortable">Tiêu đề</div>
						    					<div class="fht-cell"></div>
						    				</th>
						    				<th style="text-align:center;">
						    					<div class="th-inner sortable">Danh mục</div>
						    					<div class="fht-cell"></div>
						    				</th>
						    				<th style="text-align:center; width: 150px; ">
						    					<div class="th-inner sortable">Action</div>
						    					<div class="fht-cell"></div>
						    				</th>
						    			</tr>
						   				</thead>
										<tbody>
										@if(isset($details))
											@foreach($details as $key => $item)
											<tr>
												<td>
													<input type="checkbox" name="">
												</td>
												<td>{{ $key+1 }}</td>
												<td style="width: 120px; height: 120px; ">
													<img src="{{ url('uploads/details/'.$item->image) }}" alt="" style="width: 100%; height:100%; ">
												</td>
												<td>{{ $item->title }}</td>
												<td>{{ $item->category->title }}</td>
												<td>
													<a href="{{ url('admin/details/'.$item->id.'/edit') }}" class="btn" style="float:left;">Edit</a>
													{!! Form::open(['method' => 'DELETE', 'url' => 'admin/details/'.$item->id]) !!}
														<a href="{{ url('admin/details/'.$item->id.'/delete') }}"><button style="background:none;" type="submit" class="btn" onclick="return confirm('Are you sure?')">Delete</button></a>
													{!!Form::close() !!}
												</td>
											</tr>
											@endforeach
										@endif	
										</tbody>
									</table>
					</div>
				</div>
			</div>
			{{ $details->render() }}
		</div><!--/.row-->	
		
	</div>
	<style type="text/css">
		.pagination{padding: 0px; float: right; margin-right: 60px;}
	</style>
	
@endsection