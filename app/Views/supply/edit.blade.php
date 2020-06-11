@extends('layouts.backend')
@section('box-title')
<div class="container">
	<a href="{{route('backend.supply')}}" title=""><span class="glyphicon glyphicon-menu-left"></span>Trở về</a>
</div>
@stop
@section('box-body')

<form action="" method="POST" accept-charset="utf-8" role="form">
	<table class="table table-hover">
		<tbody>
			<tr>
				<td>Tên nhà cung cấp <span style="color: red;">*</span></td>
				<td colspan="3">
					<input type="text" name="name" value="{{$model->name}}"  class="form-control" >
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
				<td>Mã số thuế<span style="color: red;">*</span></td>
				<td>
					<input type="text" name="tax_code"  value="{{$model->tax_code}}" class="form-control" >
				</td>
				<td>Fax <span style="color: red;">*</span></td>
				<td>
					<input type="text" name="fax" value="{{$model->fax}}" class="form-control" >
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					@if($errors->has('tax_code'))
					<div class="help-block">
						{!!$errors->first('tax_code')!!}
					</div>
					@endif
				</td>
				<td></td>
				<td>
					@if($errors->has('fax'))
					<div class="help-block">
						{!!$errors->first('fax')!!}
					</div>
					@endif
				</td>
			</tr>
			<tr>
				<td>Ghi chú<span style="color: red;">*</span></td>
				<td colspan="3">
					<input type="text" name="explain" value="{{$model->explain}}" class="form-control" >
				</td>
			</tr>

			<tr>
				<td></td>
				<td>
					@if($errors->has('explain'))
					<div class="help-block">
						{!!$errors->first('explain')!!}
					</div>
					@endif
				</td>
			</tr>

			<tr>
				<td>Email<span style="color: red;">*</span></td>
				<td>
					<input type="text" name="email" value="{{$model->email}}" class="form-control" >
				</td>
				<td>Số điện thoại <span style="color: red;">*</span></td>
				<td>
					<input type="text" name="phone" value="{{$model->phone}}" class="form-control" >
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					@if($errors->has('email'))
					<div class="help-block">
						{!!$errors->first('email')!!}
					</div>
					@endif
				</td>
				<td></td>
				<td>
					@if($errors->has('phone'))
					<div class="help-block">
						{!!$errors->first('phone')!!}
					</div>
					@endif
				</td>
			</tr>
			<tr>
				<td>Địa chỉ<span style="color: red;">*</span></td>
				<td colspan="3">
					<input type="text" name="address" value="{{$model->address}}" class="form-control" >
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					@if($errors->has('address'))
					<div class="help-block">
						{!!$errors->first('address')!!}
					</div>
					@endif
				</td>
			</tr>



		</tbody>
	</table>


	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
	<button type="submit" class="btn btn-app" ><i class="fa fa-save"></i>Sửa</button>

</form>
@stop
