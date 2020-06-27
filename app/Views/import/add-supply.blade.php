@extends('layouts.backend')
@section('title','NHẬP HÀNG')
@section('box-title','Chọn nhà cung cấp')

@section('box-body')
<div class="row">
	<div class="container">
  <div class="row wizcontainer">
    <div class="col-sm-3 wizcols text-center startstatus clearfix">
      <div class="wizstatebase center-block wizstatetransit">
        <span>Chọn nhà cung cấp</span>

      </div>
      <h4>Chọn nhà cung cấp</h4>
    </div>
    <div class="col-sm-3 wizcols text-center clearfix">
      <div class="wizstatebase center-block ">
        <span>Chọn sản phẩm</span>
        <img src="images/icn-order-dispached.svg" alt="" />
      </div>
      <h4>Chọn sản phẩm</h4>

    </div>
    <div class="col-sm-3 wizcols text-center clearfix">
      <div class="wizstatebase center-block ">
        <span>Đơn hàng</span>
        <img src="images/icn-in-transit.svg" alt="" />
      </div>
      <h4>Đơn hàng</h4>
    </div>

  </div>
</div>
</div>
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
