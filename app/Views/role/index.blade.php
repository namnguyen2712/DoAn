@extends('layouts.backend')
@section('title','NHÓM QUYỀN')
@section('box-title','Danh sách nhóm quyền')
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
	  $checkPermissionAddRole =  DB::table('permissions')->where('name','role-create')->value('id');
	  $checkPermissionDeleteRole =  DB::table('permissions')->where('name','role-delete')->value('id');
	  $checkPermissionRoleAddUser =  DB::table('permissions')->where('name','role-add-user')->value('id');
  ?>
@if($listRoleOfUser->contains($checkPermissionAddRole))
<a href="{{route('backend.role-create')}}" class="btn btn-success"  style="margin: 10px 0px 15px 0px ">
	<i class="fa fa-plus"></i> <span>Thêm mới nhóm quyền</span>
</a>
@endif
<p>Tổng số: <b>{{$role->count('id') }}</b> bản ghi </p>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Mã</th>
			<th>Tên nhóm quyền</th>
			<th>Tác vụ</th>
		</tr>
	</thead>
	<tbody>
		@foreach($role as $role)
		<tr>
			<td>{{ $role->id }}</td>
			<td>{{ $role->name }}</td>
			<td>
				@if($listRoleOfUser->contains($checkPermissionRoleAddUser))
				<a href="{{ route('backend.add-user',[$role->id])}}"   title="Thêm người dùng vào nhóm quyền"><span class="ion ion-person-add" style="color: green"></span></a>
				@endif
				<a href="{{ route('backend.info-user-role',[$role->id])}}"   title="Danh sách nhóm người dùng thuộc quyền"><span class="glyphicon glyphicon-info-sign" style="color: blue"></span></a>
				@if($listRoleOfUser->contains($checkPermissionDeleteRole))
				<a href="{{ route('backend.role-delete',[$role->id])}}"  onclick="return confirm('Bạn muốn xóa danh mục này')" title="Xóa"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
				@endif
			</td>
		</tr>
		@endforeach()
	</tbody>
	<tfoot>
		<tr>
			<th>Mã</th>
			<th>Tên nhóm quyền</th>
			<th>Tác vụ</th>
		</tr>
	</tfoot>
</table>

@stop
