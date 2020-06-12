@extends('layouts.backend')
@section('box-title')
<div class="container">
		<a href="{{route('backend.user')}}" title=""><span class="glyphicon glyphicon-menu-left"></span>Trở về</a>
	</div>
@stop
@section('box-body')
    <form class="" action="index.html" method="post">
        <table class="table table-hover">
            <tbody>
				<tr>
					<p>Tên đăng nhập<span style="color: red;">*</span> </p>
				</tr>
				<tr>
					<td>Nhập lại mật khẩu cũ</td>
					<td><input type="password" class="form-control"  name="oldPassword"  placeholder="Nhập mật khẩu cũ"/></td>
				</tr>
                <tr>
					<td>Mật khẩu <span style="color: red;">*</span></td>
					<td>
						<input type="password" class="form-control"  name="newPassword"  placeholder="Nhập mật khẩu mới"/>
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
            </tbody>
        </table>


	<input type="hidden" name="_token" value="{{csrf_token()}}">
						<!-- <button type="submit" class="btn btn-primary">Thêm mới</button> -->
	<button type="submit" class="btn btn-app">Sửa</button>
</form>
@stop
