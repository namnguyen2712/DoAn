@extends('layouts.backend')
@section('title','QUẢN LÝ NHÂN VIÊN')
@section('box-body')


	<a href="{{route('backend.user-create')}}" class="btn btn-success" style="margin: 10px 0px 15px 0px ">
		<i class="fa fa-plus"></i> <span>Thêm mới nhân viên</span>
	</a>
	<div class="form-group">
		<form action="{{route('backend.search-user')}}" method="GET">
		  <input type="text" class="form-control" name="name"  placeholder="Nhập tên nhân viên cần tìm kiếm">
		</form>
	</div>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Username</th>
			<th>Họ tên</th>
			<th>Email</th>
			<th>Địa chỉ</th>
			<th>Số điện thoại</th>
			<th>Chức vụ</th>
			<th>Tác vụ</th>

			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<?php
			$role_id=DB::table('user_roles')->select('role_id')->where('user_id',$user->id)->first();
			$role=DB::table('roles')->select('name')->where('id',$role_id->role_id)->first();


		?>
		<tr>
			<td>{{$user->username}}</td>
			<td>{{$user->full_name}}</td>
			<td>{{$user->email}}</td>
			<td>{{$user->address}}</td>
			<td>{{$user->phone}}</td>
			<td>{{$role->name}}</td>
			<td>
				<a href="{{route('backend.user-edit',[$user->id])}}'" title="Sửa" ><span class="glyphicon glyphicon-pencil" style="color: blue"></span></a>
				<a href="{{ route('backend.user-delete',[$user->id])}}" onclick="return confirm('Bạn muốn xóa nhân viên này')" title="Xóa"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
			</td>
		</tr>
		@endforeach()
	</tbody>
	
</table>
<div class="text-center">
	{{ $users->links() }}
</div>

@stop
