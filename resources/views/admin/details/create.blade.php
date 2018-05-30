@extends('layouts.admin')
@section('title') Thêm mới thông tin @endsection
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{ url('admin') }}"><svg class="glyph stroked home"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="{{ url('admin/details') }}">Thông tin du lịch</a></li>
				<li class="active">Thêm mới</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Thêm mới thông tin</h3>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Thêm mới thông tin du lịch</div>
					<div class="panel-body">
						<div class="col-md-10">
							
							{!! Form::open(['method' => 'POST', 'url' => 'admin/details', 'files' => true ,'role' => 'form']) !!}
								<div class="form-group">
									<label>Tên tiêu đề</label>
									<input type="text" class="form-control" placeholder="Mời bạn nhập tên thông tin" name="title">
								</div>
								<div class="form-group">
									<label>Danh mục</label>
									{!! Form::select('category_id', $categories, null, ["class" => "form-control"]) !!}	
								</div>
								<div class="form-group">
									<label>Giá cũ</label>
									<input type="text" class="form-control" placeholder="Mời bạn nhập giá" name="price_old" value="0">
								</div>	
								<div class="form-group">
									<label>Gía khuyến mãi</label>
									<input type="text" class="form-control" placeholder="Mời bạn nhập giá khuyến mãi" name="price_new">
								</div>	
								<div class="form-group">
									<label>Thời gian</label>
									<input type="text" class="form-control" placeholder="Mời bạn nhập thời gian" name="time">
								</div>	
								<div class="form-group">
									<label>Nơi khởi hành</label>
									<input type="text" class="form-control" placeholder="Mời bạn nhập nơi khởi hành" name="place_of_departure">
								</div>	
								<div class="form-group">
									<label>Ngày khởi hành</label>
									<input type="text" class="form-control" placeholder="Mời bạn nhập ngày khởi hành" name="day_departure">
								</div>	
								<div class="form-group">
									<label>Số chỗ ngồi</label>
									<input type="text" class="form-control" placeholder="Mời bạn nhập số chỗ ngồi còn" name="number_of_seats">
								</div>	
								<div class="form-group">
									<label>Lịch trình</label>
									<textarea name="schedule" class="form-control" id=ckeditor1>
									</textarea>	
								</div>	
								<div class="form-group">
									<label>Thông tin</label>
									<textarea name="information" class="form-control" id=ckeditor2>
									
									</textarea>
								</div>	
								<div class="form-group">
									<label>Tìm kiếm giá</label>
									<select name="search_price" class="form-control">
										<option value="Dưới 3 triệu">Dưới 3 triệu</option>
										<option value="Từ 3 - 5 triệu">Từ 3 - 5 triệu</option>
										<option value="Từ 5 - 10 triệu">Từ 5 - 10 triệu</option>
										<option value="Từ 10 - 20 triệu">Từ 10 - 20 triệu</option>
										<option value="Trên 20 triệu">Trên 20 triệu</option>
									</select>
								</div>
								<div class="form-group">
									<label>Ảnh</label>
									<input type="file" class="form-control" name="image">
								</div>		
								<div class="form-group">
									<label>Tour hot</label>
									<input type="text" name="hot" id="hot" class="form-control"><!-- <label for="hot">&nbsp;Tin nổi bật</label> -->

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