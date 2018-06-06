<div class="form-group">
									<label>Tên tiêu đề</label>
									<!-- <input type="text" class="form-control" placeholder="Mời bạn nhập tên thông tin" name="title"> -->
									{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => "Mời bạn nhập tên thông tin"]) !!}
									<!-- {!! $errors->first('title', '<span id="title-error" style="color: red" >:message</span>') !!} -->
								</div>
								<div class="form-group">
									<label>Danh mục</label>
									{!! Form::select('category_id', $categories, null, ["class" => "form-control"]) !!}
								</div>
								<div class="form-group">
									<label>Giá cũ</label>
									<!-- <input type="text" class="form-control" placeholder="Mời bạn nhập giá" name="price_old" value="0"> -->
									{!! Form::text('price_old', null, ["class" => "form-control", 'placeholder' => "Mời bạn nhập giá"]) !!}
								</div>	
								<div class="form-group">
									<label>Gía khuyến mãi</label>
									<!-- <input type="text" class="form-control" placeholder="Mời bạn nhập giá khuyến mãi" name="price_new"> -->
									{!! Form::text('price_new',null, ['class' => "form-control", "placeholder" => "Mời bạn nhập giá khuyến mãi"]) !!}
								</div>	
								<div class="form-group">
									<label>Giảm giá</label>
									{!! Form::text('sale',null, ['class' => "form-control", "placeholder" => "Giảm giá"]) !!}
								</div>	
								<div class="form-group">
									<label>Thời gian</label>
									<!-- <input type="text" class="form-control" placeholder="Mời bạn nhập thời gian" name="time"> -->
									{!! Form::text('time', null, ["class" => "form-control", "placeholder" => "Mời bạn nhập thời gian"]) !!}
								</div>	
								<div class="form-group">
									<label>Nơi khởi hành</label>
									<!-- <input type="text" class="form-control" placeholder="Mời bạn nhập nơi khởi hành" name="place_of_departure"> -->
									{!! Form::text('place_of_departure', null, ["class" => "form-control", "placeholder" => "Mời bạn nhập nơi khởi hành"]) !!}
								</div>	
								<div class="form-group">
									<label>Ngày khởi hành</label>
									<!-- <input type="text" class="form-control" placeholder="Mời bạn nhập ngày khởi hành" name="day_departure"> -->
									{!! Form::text('day_departure', null, ["class" => "form-control", "placeholder" => "Mời bạn nhập ngày khởi hành"]) !!}
								</div>	
								<div class="form-group">
									<label>Số chỗ ngồi</label>
									<!-- <input type="text" class="form-control" placeholder="Mời bạn nhập số chỗ ngồi còn" name="number_of_seats"> -->
									{!! Form::text('number_of_seats', null, ["class" => "form-control", "placeholder" => "Mời bạn nhập số chỗ ngồi còn"]) !!}
								</div>	
								<div class="form-group">
									<label>Lịch trình</label>
									<!-- <textarea name="schedule" class="form-control" id=ckeditor1>
									</textarea>	 -->
									{!! Form::textarea('schedule', null, ["class" => "form-control", "id" => "ckeditor1"]) !!}
								</div>	
								<div class="form-group">
									<label>Thông tin</label>
									<!-- <textarea name="information" class="form-control" id=ckeditor2>
									
									</textarea> -->
									{!! Form::textarea('information', null, ["class" => "form-control", "id" => "ckeditor2"]) !!}
								</div>	
								<div class="form-group">
									<label>Tìm kiếm giá</label>
									<select name="search_price" class="form-control">
										<option>Mời chọn giá trị để tìm kiếm</option>
										<option value="Dưới 3 triệu" @if ($details->search_price == 'Dưới 3 triệu') selected @endif>Dưới 3 triệu</option>
										<option value="Từ 3 - 5 triệu"  @if ($details->search_price == 'Từ 3 - 5 triệu') selected @endif>Từ 3 - 5 triệu</option>
										<option value="Từ 5 - 10 triệu" @if ($details->search_price == 'Từ 5 - 10 triệu') selected @endif>Từ 5 - 10 triệu</option>
										<option value="Từ 10 - 20 triệu" @if ($details->search_price == 'Từ 10 - 20 triệu') selected @endif>Từ 10 - 20 triệu</option>
										<option value="Trên 20 triệu" @if ($details->search_price == 'Trên 20 triệu') selected @endif>Trên 20 triệu</option>
									</select>

								</div>
								<div class="form-group">
									<label>Ảnh</label>
									<input type="file" class="form-control" name="image">
								</div>	
								<div class="form-group" style="overflow: hidden;">
									<label>Ảnh đã được chọn</label>
									<img src="{{ url('uploads/details/'.$details->image)}}" style="width: 100px; height: 100px; ">
								</div>
								<div class="form-group">
									<label>Tin nổi bật</label>
									<div class="checkbox">
										<label>
											{!! Form::checkbox('hot', '1') !!}Tin nổi bật
										</label>
									</div>
								</div>						
								<button type="submit" class="btn btn-primary">Submit</button>
								<button type="reset" class="btn btn-default">Reset</button>