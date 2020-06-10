@extends('layouts.backend')
@section('box-title')
<div class="container">
	<a href="{{route('backend.products')}}" title=""><span class="glyphicon glyphicon-menu-left"></span>Trở về</a>
</div>
@stop()
@section('box-body')

<form action="" method="POST" role="form" enctype="multipart/form-data">
	<div class="form-group box-body row">
		<label class="col-md-3 control-label">Tên sản phẩm<span style="color: red;">*</span></label>
		<div class="col-md-9">


				<input type="text" class="form-control" name="name" value="{{ old('name')}}" placeholder="Nhập tên sản phẩm">

		</div>
	</div>
	<div class="form-group box-body row">
		<label class="col-md-1 control-label">Danh mục<span style="color: red;">*</span></label>
		<div class="col-md-4">

		<select name="cat_id" id="inputCat_id" class="form-control" value="{{ old('cat_id')}}" required>
			<option value="">Chọn danh mục</option>
			@foreach($cats as $cat)
			<option value="{{$cat->id}}" >
				{{$cat->name}}
			</option>
			@endforeach
		</select>
		</div>
		<div class="col-md-1">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-category">
				<i class="fa fa-plus"></i>
			</button>
			<form  action="" method="post" role="form">
				<div class="modal fade" id="modal-add-category">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Thêm mới danh mục</h4>
					  </div>
					  <div class="modal-body">
						<p>Nhập tên danh mục sản phẩm</p>

						<input type="text" name="CatName" class="form-control" value="" />
						<input type="hidden" name="_token" value="{{csrf_token()}}">
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
						<button type="button" onclick="BtnAddCategory_Click()" class="btn btn-primary">Lưu</button>
					  </div>
					</div>
					<!-- /.modal-content -->
				  </div>
				  <!-- /.modal-dialog -->
				</div>
			</form>
		</div>
			<label class="col-md-1 control-label">Xuất xứ<span style="color: red;">*</span></label>
			<div class="col-md-4">
				<select name="nation_id"  class="form-control" value="{{ old('nation_id')}}" required>
  				  <option value="">Chọn quốc gia</option>
  				  @foreach($nations as $nation)
  				  <option value="{{$nation->id}}" >
  					  {{$nation->name}}
  				  </option>
  				  @endforeach
  			  </select>

			</div>
			<div class="col-md-1">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-nation">
					<i class="fa fa-plus"></i>
				</button>
				<form  action="" method="post" role="form">
					<div class="modal fade" id="modal-add-nation">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Thêm mới quốc gia</h4>
						  </div>
						  <div class="modal-body">
							<p>Nhập tên quốc gia</p>

							<input type="text" name="NationName" class="form-control" value="" />
							<input type="hidden" name="_token" value="{{csrf_token()}}">
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
							<button type="button" onclick="BtnAddNation_Click()" class="btn btn-primary">Lưu</button>
						  </div>
						</div>
						<!-- /.modal-content -->
					  </div>
					  <!-- /.modal-dialog -->
					</div>
				</form>
			</div>
	</div>
	<div class="form-group box-body row">
		<label class="col-md-1 control-label">Đơn vị tính<span style="color: red;">*</span></label>
		<div class="col-md-4">
			<select name="unit_id"  class="form-control" value="{{ old('unit_id')}}" required>
  			  <option value="">Chọn đơn vị tính</option>
  			  @foreach($units as $unit)
  			  <option value="{{$unit->id}}" >
  				  {{$unit->name}}
  			  </option>
  			  @endforeach
  		  </select>
		</div>
		<div class="col-md-1">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-unit">
			   <i class="fa fa-plus"></i>
			</button>
			<form  action="" method="post" role="form">
				<div class="modal fade" id="modal-add-unit">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Thêm mới đơn vị tính</h4>
					  </div>
					  <div class="modal-body">
						<p>Nhập tên đơn vị tính</p>

						<input type="text" name="UnitName" class="form-control" value="" />
						<input type="hidden" name="_token" value="{{csrf_token()}}">
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
						<button type="button" onclick="BtnAddUnit_Click()" class="btn btn-primary">Lưu</button>
					  </div>
					</div>
					<!-- /.modal-content -->
				  </div>
				  <!-- /.modal-dialog -->
				</div>
			</form>
		</div>
		<label class="col-md-1 control-label">Giá<span style="color: red;">*</span></label>
		<div class="col-md-5">
			<div class="input-group">
				<span class="input-group-addon"><span class="fa fa-info"></span></span>
				<input type="text" class="form-control" name="price" value="{{ old('price')}}"  placeholder="Nhập giá bán sản phẩm">
			</div>
		</div>
	</div>
	<div class="form-group box-body row">
		<label class="col-md-1 control-label">Ảnh chính<span style="color: red;">*</span></label>
		<div class="col-md-5">
			<input type="file" id="upload_images" class="form-control" name="images1" value="{{ old('images1')}}"  placeholder="Ảnh chính">
		</div>
		<label class="col-md-1 control-label">Ảnh mô tả<span style="color: red;">*</span></label>
		<div class="col-md-5">
			<input type="file" id="upload_images" class="form-control" name="images2" value="{{ old('images2')}}"  placeholder="Ảnh chính">
		</div>
	</div>
	<div class="form-group box-body row">
		<label class="col-md-1 control-label">Thành phần<span style="color: red;">*</span></label>
		<div class="col-md-5">
		<input type="text" class="form-control" name="ingredient" value="{{ old('ingredient')}}"  placeholder="Nhập thành phần chính của sản phẩm">
		</div>
		<label class="col-md-1 control-label">Hàm lượng<span style="color: red;">*</span></label>
		<div class="col-md-5">
			<input type="text" class="form-control" name="content" value="{{ old('content')}}" placeholder="Nhập hàm lượng chính của sản phẩm">
		</div>
	</div>
	<div class="form-group box-body row">
		<label class="col-md-3 control-label">Công dụng<span style="color: red;">*</span></label>
		<div class="col-md-9">

					<textarea name="uses" class="form-control" rows="4" placeholder="Nhập công dụng chính"></textarea>

		</div>
	</div>
	<div class="form-group box-body row">
		<label class="col-md-3 control-label">Cách sử dụng<span style="color: red;">*</span></label>
		<div class="col-md-9">
			<textarea name="using" rows="4"value="{{ old('using')}}" class="form-control" placeholder="Cách sử dụng sản phẩm" ></textarea>
		</div>
	</div>
	<div class="form-group box-body row">
		<label class="col-md-3 control-label">Chú ý<span style="color: red;">*</span></label>
		<div class="col-md-9">
			<textarea name="attention" class="form-control"  rows="4" placeholder="Chú ý khi sử dụng"></textarea>
		</div>
	</div>
</form>

<input type="hidden" name="_token" value="{{csrf_token()}}">
<!-- <button type="submit" class="btn btn-primary">Thêm mới</button> -->
<button type="submit" class="btn btn-app"><i class="fa fa-save"></i> Thêm mới</button>

@stop()
