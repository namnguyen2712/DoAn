@extends('layouts.backend')
@section('title','NHẬP HÀNG')
@section('box-title','Chọn sản phẩm')

@section('box-body')
<div class="row">
	<div class="container">
  <div class="row wizcontainer">
    <div class="col-sm-3 wizcols text-center startstatus clearfix">
      <div class="wizstatebase center-block wizstatedone">
        <span>Chọn nhà cung cấp</span>

      </div>
      <h4>Chọn nhà cung cấp</h4>
    </div>
    <div class="col-sm-3 wizcols text-center clearfix">
      <div class="wizstatebase center-block wizstatetransit ">
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
<div class="" id="sum-import">
	<p>Nhà cung cấp: {{ $s->name }}</p>

</div>
<div class="form-group">
	<form action="{{route('backend.import-search-product',['s_id'=> $s->id])}}" method="GET">
	  <input type="text" class="form-control" name="name"  placeholder="Nhập tên sản phẩm tìm kiếm">
	</form>
</div>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tên sản phẩm</th>
			<th>Giá bán tại cửa hàng</th>
			<th>Loại sản phẩm</th>
			<th>Trạng thái</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr>
		@foreach($products as $pro)
		<?php
			$cat = DB::table('category')->select('name')->where('id',$pro->cat_id)->first();

		?>
		<tr>
			<td>{{ $pro->id }}</td>
			<td>{{ $pro->name }}</td>
			<td>{{number_format($pro->price,0,'','.')}}</td>
			<td>{{$cat->name}}</td>


			<td>
				@if($pro->status != '0')
					<a href="{{ route('backend.add-import',['id'=>$pro->id,'s_id'=>$s->id]) }}" class="add-import-quick" title="Thêm vào giỏ hàng" id="click_cart" data-id='{{ $pro->id }}'><i class="glyphicon glyphicon-plus" style="color: green;"></i></a>
				@else
					<span class="glyphicon glyphicon-plus" style="color: #888;" title="Sản phẩm này đã ngừng kinh doanh"></span>
				@endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="text-center">
	{{ $products->links() }}
</div>

<a href="{{ route('backend.import-reciept',['s_id'=>$s->id]) }}" class="btn btn-success">Xem đơn hàng</a>

@stop()
