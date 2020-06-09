@extends('layouts.backend')
@section('title','BÁN HÀNG')
@section('box-title','Chọn sản phẩm')

@section('box-body')
<div class="" id="sum-order">
	<p>Khách hàng: {{ $s->name }}</p>
</div>
<div class="form-group">
	<form action="{{route('backend.order-search-product',['s_id'=> $s->id])}}" method="GET">
	  <input type="text" class="form-control" name="name"  placeholder="Nhập tên sản phẩm tìm kiếm">
	</form>
</div>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tên sản phẩm</th>
			<th>Ảnh</th>
			<th>Giá</th>
			<th>Loại sản phẩm</th>
			<th>Tình trạng</th>
			<th>Số lượng</th>
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
			<td><img src="{{ url('/')}}/public/img/{{ $pro->images1 }}" style="width: 50px; height: 60px;">
			<td>{{number_format($pro->price,0,'','.')}}</td>
			<td>{{$cat->name}}</td>

			<td>
				<?php if ($pro->status == 0){
					echo "Ngừng kinh doanh";
				}elseif($pro->status==1){
					echo "Kinh doanh";
				}else{
					echo "Ngừng kinh doanh";
				}
				 ?>
			</td>
			<td>{{$pro->quantity}}</td>
			<td>
				@if($pro->status != '0')
					<a href="{{ route('backend.add-order',['id'=>$pro->id,'s_id'=>$s->id]) }}" class="add-order-quick" title="Thêm vào giỏ hàng" id="click_cart" data-id='{{ $pro->id }}'><i class="glyphicon glyphicon-plus" style="color: green;"></i></a>
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

<a href="{{ route('backend.order-reciept',['s_id'=>$s->id]) }}" class="btn btn-success">Xem đơn hàng</a>

@stop()
