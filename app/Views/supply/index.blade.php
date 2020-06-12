@extends('layouts.backend')
@section('title','QUẢN LÝ NHÀ CUNG CẤP')
@section('box-body')


		<a href="{{route('backend.supply-create')}}" class="btn btn-success" style="margin: 10px 0px 15px 0px ">
			<i class="fa fa-plus"></i> <span>Thêm mới nhà cung cấp</span>
		</a>
		<div class="form-group">
			<form action="{{route('backend.search-supply')}}" method="GET">
			  <input type="text" class="form-control" name="name"  placeholder="Nhập tên nhà cung cấp cần tìm kiếm">
			</form>
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
					<a href="{{route('backend.supply-edit',[$supply->id])}}'" title="Sửa" ><span class="glyphicon glyphicon-pencil" style="color: blue"></span></a>
					<a href="{{ route('backend.supply-delete',[$supply->id])}}" onclick="return confirm('Bạn muốn xóa nhà cung cấp này')" title="Xóa"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
				</td>
			</tr>
			@endforeach()
		</tbody>
		
	</table>
	<div class="text-center">
		{{ $supplys->links() }}
	</div>

@stop()
