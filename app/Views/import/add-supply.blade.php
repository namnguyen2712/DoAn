@extends('layouts.backend')
@section('title','NHẬP HÀNG')
@section('box-title','Chọn nhà cung cấp')

@section('box-body')
<a href="{{route('backend.supply-create')}}" class="btn btn-success"  style="margin: 10px 0px 15px 0px ">
	<i class="fa fa-plus"></i> <span>Thêm mới nhà cung cấp</span>
</a>
<div class="form-group">
	<form action="{{route('backend.import-search-supply')}}" method="GET">
	  <input type="text" class="form-control" name="name"  placeholder="Nhập tên nhà cung cấp cần tìm kiếm">
	</form>
</div>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tên nhà cung cấp</th>
			<th>Địa chỉ</th>
			<th>Số điện thoại</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($supply as $s)
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
				<a href="{{ route('backend.import-add-product',['s_id'=> $s->id]) }}" class="btn btn-primary">Chọn</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop()
