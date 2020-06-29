@extends('layouts.backend')
@section('title','QUẢN LÝ KHÁCH HÀNG')
@section('box-body')


<a href="{{route('backend.customer-create')}}" title="Thêm danh mục" class="btn btn-success" style="margin: 10px 0px 15px 0px ">
	<i class="fa fa-plus"></i> <span>Thêm mới khách hàng</span>
</a>
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
			<td><a href="{{route('backend.customer-edit',[$cus->id])}}'"  ><span class="glyphicon glyphicon-pencil" style="color: green"></span></a></td>
		</tr>
		@endforeach()
	</tbody>

</table>

<div class="text-center">
	{{ $customers->links() }}
</div>

@stop
