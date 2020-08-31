@extends('layouts.backend')
@section('title','QUẢN LÝ KHÁCH HÀNG')
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
	  $checkPermissionAddCustomer =  DB::table('permissions')->where('name','customer-create')->value('id');
	  $checkPermissionEditCustomer =  DB::table('permissions')->where('name','customer-edit')->value('id');
  ?>
  @if($listRoleOfUser->contains($checkPermissionAddCustomer))
<a href="{{route('backend.customer-create')}}" title="Thêm danh mục" class="btn btn-success" style="margin: 10px 0px 15px 0px ">
	<i class="fa fa-plus"></i> <span>Thêm mới khách hàng</span>
</a>
@endif
<div class="form-group">
	<form action="{{route('backend.search-customer')}}" method="GET">
	  <input type="text" class="form-control" name="name"  placeholder="Nhập tên khách hàng cần tìm kiếm">
	</form>
</div>
<p>Tổng số: <b>{{$customers->count('id') }}</b> bản ghi </p>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Mã</th>
			<th>Họ tên</th>
			<th>Email</th>
			<th>Địa chỉ</th>
			<th>Số điện thoại</th>
			<th>Tác vụ</th>
		</tr>
	</thead>
	<tbody>
		@foreach($customers as $cus)
		<tr>
			<td>{{$cus->id}}</td>
			<td>{{$cus->name}}</td>
			<td>{{$cus->email}}</td>
			<td>{{$cus->address}}</td>
			<td>{{$cus->phone}}</td>

			<td>
				@if($listRoleOfUser->contains($checkPermissionEditCustomer))
				<a href="{{route('backend.customer-edit',[$cus->id])}}'"  ><span class="glyphicon glyphicon-pencil" style="color: green"></span></a>
				@endif
			</td>
		</tr>
		@endforeach()
	</tbody>

</table>

<div class="text-center">
	{{ $customers->links() }}
</div>

@stop
