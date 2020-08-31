@extends('layouts.backend')
@section('title','QUẢN LÝ NHÀ CUNG CẤP')
@section('box-body')
<?php
	$roleUser = DB::table('user')
	->join('user_roles','user.id','=','user_roles.user_id')
	->join('roles','user_roles.role_id','=','roles.id')
	->where('user.id','=',Auth()->guard('admin')->user()->id)
	->select('*')
	->first();
	$listRoleOfUser = DB::table('user')
	  ->join('user_roles', 'user.id', '=', 'user_roles.user_id')
	  ->join('roles', 'user_roles.role_id', '=', 'roles.id')
	  ->where('user.id',Auth()->guard('admin')->user()->id)
	  ->select('roles.*')
	  ->get()->pluck('id')->toArray();

	  $listRoleOfUser = DB::table('roles')
	  ->join('roles_permissions', 'roles.id', '=', 'roles_permissions.role_id')
	  ->join('permissions','roles_permissions.permission_id', '=', 'permissions.id')
	  ->whereIn('roles.id',$listRoleOfUser) // lấy giá trị tại id
	  ->select('permissions.*')
	  ->get()->pluck('id')->unique();
	  $checkPermissionAddSupply =  DB::table('permissions')->where('name','supply-create')->value('id');
	  $checkPermissionEditSupply =  DB::table('permissions')->where('name','supply-edit')->value('id');
	  $checkPermissionDeleteSupply =  DB::table('permissions')->where('name','supply-delete')->value('id');
  ?>
	@if($listRoleOfUser->contains($checkPermissionAddSupply))
		<a href="{{route('backend.supply-create')}}" class="btn btn-success" style="margin: 10px 0px 15px 0px ">
			<i class="fa fa-plus"></i> <span>Thêm mới nhà cung cấp</span>
		</a>
	@endif
		<div class="form-group">
			<form action="{{route('backend.search-supply')}}" method="GET">
			  <input type="text" class="form-control" name="name"  placeholder="Nhập tên nhà cung cấp cần tìm kiếm">
			</form>
		</div>
		<div>
			<p>Tổng số: <b>{{$supplys->count('id') }}</b> bản ghi </p>

		</div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Tên nhà cung cấp</th>
				<th>Số điện thoại</th>
				<th>Địa chỉ</th>
				<th>Email</th>
				<th>Ghi chú</th>
				<th>Tác vụ</th>
			</tr>
		</thead>
		<tbody >
			@foreach($supplys as $supply)
			<tr>
				<td>{{$supply->name}}</td>
				<td>{{$supply->phone}}</td>
				<td>{{$supply->address}}</td>
				<td>{{$supply->email}}</td>
				<td>{{$supply->explain}}</td>
				<td>
					@if($listRoleOfUser->contains($checkPermissionEditSupply))
					<a href="{{route('backend.supply-edit',[$supply->id])}}'" title="Sửa" ><span class="glyphicon glyphicon-pencil" style="color: green"></span></a>
   					@endif
					@if($listRoleOfUser->contains($checkPermissionDeleteSupply))
					<a href="{{ route('backend.supply-delete',[$supply->id])}}" onclick="return confirm('Bạn muốn xóa nhà cung cấp này')" title="Xóa"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
   					@endif
				</td>
			</tr>
			@endforeach()
		</tbody>

	</table>
	<div class="text-center">
		{{ $supplys->links() }}
	</div>

@stop()
