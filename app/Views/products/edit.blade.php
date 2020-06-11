@extends('layouts.backend')
@section('box-title')
<div class="container">
	<a href="{{route('backend.products')}}" title=""><span class="glyphicon glyphicon-menu-left"></span>Trở về</a>
</div>
@stop()
@section('box-body')



<form action="" method="POST" role="form" enctype="multipart/form-data">
	<legend>Sửa sản phẩm</legend>
	<table class="table table-hover">
		<tbody>
			<tr>
				<td>Tên sản phẩm<span style="color: red;">*</span></td>
				<td colspan="3">
					<input type="text" class="form-control" name="name" value="{{$model->name}}" placeholder="">
				</td>
			</tr>
			<tr>
                <td></td>
                <td>
                    @if($errors->has('name'))
                    <div class="help-block">
                        {!!$errors->first('name')!!}
                    </div>
                    @endif
                </td>
            </tr>
			<tr>
				<td>Danh mục<span style="color: red;">*</span></td>
				<td>
					<select name="cat_id" id="inputCat_id" class="form-control" required>
						<option value="">Chọn danh mục</option>
						@foreach($cats as $cat)
							<option value="{{$cat->id}}" <?php if ($cat->id == $model->cat_id) echo "selected";  ?>>
								{{$cat->name}}
							</option>
						@endforeach
					</select>
				</td>
				<td>Xuất sứ<span style="color: red;">*</span></td>
				<td>
					<select name="nation_id"  class="form-control"  required>
						<option value="">Chọn quốc gia</option>
						@foreach($nations as $nation)
							<option value="{{$nation->id}}" <?php if ($nation->id == $model->nation_id) echo "selected";  ?>>
								{{$nation->name}}
							</option>
						@endforeach
					</select>
				</td>
			</tr>

			<tr>
				<td>Đơn vị tính<span style="color: red;">*</span></td>
				<td>
					<select name="unit_id"  class="form-control" required>
						<option value="">Chọn đơn vị tính</option>
						@foreach($units as $unit)
							<option value="{{$unit->id}}" <?php if ($unit->id == $model->unit_id) echo "selected";  ?>>
								{{$unit->name}}
							</option>
						@endforeach
					</select>
				</td>
				<td>Giá<span style="color: red;">*</span></td>
				<td>
					<input type="text" class="form-control" name="price" value="{{$model->price}}" placeholder="">
				</td>
			</tr>
			<tr>
                <td></td>
                <td>
                </td>
                <td></td>
                <td>
                    @if($errors->has('price'))
                    <div class="help-block">
                        {!!$errors->first('price')!!}
                    </div>
                    @endif
                </td>
            </tr>
			<tr>
				<td>Tình trạng<span style="color: red;">*</span></td>
				<td colspan="3">
					<select name="status"  class="form-control" required>
						<option value="1" <?php if (1 == $model->status) echo "selected";  ?> >
							Bán hàng
						</option>
						<option value="0" <?php if (0 == $model->status) echo "selected";  ?> >
							Ngừng bán hàng
						</option>
					</select>
				</td>
			</tr>


			<tr>
				<td>Ảnh chính<span style="color: red;">*</span></td>
				<td>
					<input type="file" class="form-control" name="images1"   placeholder="">
				</td>
				<td>Ảnh mô tả<span style="color: red;">*</span></td>
				<td>
					<input type="file" class="form-control" name="images2"  placeholder="">
				</td>
			</tr>
			<tr>
                <td></td>
                <td>
                    @if($errors->has('images1'))
                    <div class="help-block">
                        {!!$errors->first('images1')!!}
                    </div>
                    @endif
                </td>
                <td></td>
                <td>
                    @if($errors->has('images2'))
                    <div class="help-block">
                        {!!$errors->first('images2')!!}
                    </div>
                    @endif
                </td>
            </tr>

			<tr>
				<td>Thành phần<span style="color: red;">*</span></td>
				<td>
					<input type="text" class="form-control" name="ingredient" value="{{$model->ingredient}}" placeholder="">
				</td>
				<td>Hàm lượng<span style="color: red;">*</span></td>
				<td>
					<input type="text" class="form-control" name="content" value="{{$model->content}}" placeholder="">
				</td>
			</tr>
			<tr>
				<td>Công dụng<span style="color: red;">*</span></td>
				<td colspan="3">
					<textarea name="uses"  rows="4" class="form-control">{{$model->uses}}</textarea>
				</td>
			</tr>
			<tr>
				<td>Cách sử dụng<span style="color: red;">*</span></td>
				<td colspan="3">
					<textarea name="using"  rows="4" class="form-control">{{$model->using}}</textarea>
				</td>
			</tr>
			<tr>
				<td>Chú ý<span style="color: red;">*</span></td>
				<td colspan="3">
					<textarea name="attention"  rows="4" class="form-control">{{$model->attention}}</textarea>
				</td>
			</tr>

		</tbody>
	</table>


	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<button type="submit" class="btn btn-app" ><i class="fa fa-save"></i> Sửa</button>

</form>
@stop()
