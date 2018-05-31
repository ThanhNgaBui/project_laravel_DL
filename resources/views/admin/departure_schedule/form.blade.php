<div class="form-group">
	<label>Tên tiêu đề</label>
		{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => "Tên tiêu đề"]) !!}
</div>
<div class="form-group">
	<label>Giới thiệu</label>
	{!! Form::textarea('introduce', null, ['class' => 'form-control']) !!}
	<script> CKEDITOR.replace('introduce'); </script>
</div>								
<div class="form-group">
	<label>Thông tin chi tiết</label>
	{!! Form::textarea('information', null, ['class' => 'form-control']) !!}
	<script> CKEDITOR.replace('information'); </script>
</div>	
<div class="form-group">
	<label>Tin nổi bật</label>
	<div class="checkbox">
		<label>
			<!-- <input type="checkbox" value="1" name='hot'>Tin nổi bật -->
			{!! Form::checkbox('hot', '1') !!}Tin nổi bật
		</label>
	</div>
</div>
<div class="form-group">
	<label>Ảnh</label>
	{!! Form::file('image') !!}
</div>	

<button type="submit" class="btn btn-primary">Submit</button>
<button type="reset" class="btn btn-default">Reset</button>