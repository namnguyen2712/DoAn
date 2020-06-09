@extends('layouts.backend')
@section('title','BÁN HÀNG')
@section('box-title','Chọn khách hàng')

@section('box-body')
<a href="{{route('backend.customer-create')}}" class="btn btn-success"  style="margin: 10px 0px 15px 0px ">
	<i class="fa fa-plus"></i> <span>Thêm mới khách hàng</span>
</a>
<div class="form-group">
	<form action="{{route('backend.order-search-customer')}}" method="GET">
	  <input type="text" class="form-control" name="phone"  placeholder="Nhập số điện thoại khách hàng cần tìm kiếm">
	</form>
</div>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tên khách hàng</th>
			<th>Địa chỉ</th>
			<th>Số điện thoại</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($customer as $s)
		<tr>
			<td>
				{{ $s->id }}
			</td>
			<td>
				{{ $s->name }}
			</td>
			<td>
				{{ $s->address }}
			</td>
			<td>
				{{ $s->phone }}
			</td>
			<td>
				<a href="{{ route('backend.order-add-product',['s_id'=> $s->id]) }}" class="btn btn-primary">Chọn</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop()
