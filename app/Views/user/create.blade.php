@extends('layouts.backend')
@section('box-title')
<div class="container">
		<a href="{{route('backend.user')}}" title=""><span class="glyphicon glyphicon-menu-left"></span>Trở về</a>
	</div>
@stop
@section('box-body')

				<form action="" method="POST" role="form">
					<table class="table table-hover">
			<tbody>
				<tr>
					<td>Tài khoản <span style="color: red;">*</span></td>
					<td colspan="3">
						<input type="text" class="form-control" name="username" value="{{ old('username')}}" placeholder="Nhập tên tài khoản"/>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						@if($errors->has('username'))
							<div class="help-block">
								{!!$errors->first('username')!!}
							</div>
						@endif
					</td>
				</tr>
				<tr>
					<td>Mật khẩu <span style="color: red;">*</span></td>
					<td>
						<input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu"/>
					</td>
					<td>Nhập lại mật khẩu <span style="color: red;">*</span></td>
					<td>
						<input type="password" class="form-control" name="password_rp" placeholder="Nhập lại mật khẩu"/>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						@if($errors->has('password'))
							<div class="help-block">
								{!!$errors->first('password')!!}
							</div>
						@endif
					</td>
					<td></td>
					<td>
						@if($errors->has('password_rp'))
							<div class="help-block">
								{!!$errors->first('password_rp')!!}
							</div>
						@endif
					</td>
				</tr>
				<tr>
					<td>Họ và tên <span style="color: red;">*</span></td>
					<td>
						<input type="text" class="form-control" name="full_name" value="{{ old('full_name')}}" placeholder="Nhập họ và tên"/>
					</td>
					<td>Số điện thoại <span style="color: red;">*</span></td>
					<td>
						<input type="text" class="form-control" name="phone" value="{{ old('phone')}}" placeholder="Nhập số điện thoại"/>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						@if($errors->has('full_name'))
							<div class="help-block">
								{!!$errors->first('full_name')!!}
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
					<td>Email <span style="color: red;">*</span></td>
					<td>
						<input type="email" class="form-control" name="email" value="{{ old('email')}}" placeholder="Nhập email"/>
					</td>
					<td>Địa chỉ <span style="color: red;">*</span></td>
					<td>
						<input type="text" class="form-control" name="address" value="{{ old('address')}}" placeholder="Nhập địa chỉ"/>
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
						@if($errors->has('address'))
							<div class="help-block">
								{!!$errors->first('address')!!}
							</div>
						@endif
					</td>
				</tr>



				<tr>
					<td>Giới tính <span style="color: red;">*</span></td>
					<td>
						<select class="form-control" name="sex">
							<option value="Nam">Nam</option>
							<option value="Nữ">Nữ</option>
							<option value="Chưa xác đinh">Chưa xác đinh</option>
						</select>
					</td>
					<td>Chức vụ <span style="color: red;">*</span></td>
					<td>
						<select name="roleID[]"  class="form-control"  required>
							<option value="">Chọn chức vụ</option>
							@foreach($roles as $role)
							<option value="{{$role->id}}" >
								{{$role->name}}
							</option>
							@endforeach
						</select>
					</td>
				</tr>
				<tr>

				</tr>
			</tbody>
		</table>


<input type="hidden" name="_token" value="{{csrf_token()}}">
					<!-- <button type="submit" class="btn btn-primary">Thêm mới</button> -->
<button type="submit" class="btn btn-primary">Thêm mới</button>
</form>
@stop()
