@extends('layouts.backend')
@section('title','QUẢN LÝ BÁN HÀNG')
@section('box-title','Danh sách hóa đơn bán')
@section('box-body')
<a href="{{ route('backend.order-add-supply') }}" title="Tạo hóa đơn" class="btn btn-success" style="margin: 10px 0px 15px 0px ">
	<i class="fa fa-plus"></i> <span>Tạo mới hóa đơn bán</span>
</a>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Số</th>
				<th>Khách hàng</th>
				<th>Thông tin đơn hàng</th>
				<th>Tổng đơn hàng</th>
				<th>Thời gian lập</th>
				<th>Tác vụ</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($order as $i)
			<?php
				$i_detail = DB::table('order_detail')->where('order_id',$i->id)->get();
				$customer = DB::table('customer')->where('id',$i->cus_id)->first();

			 ?>
			<tr>
				<td>{{ $i->id }}</td>
				<td>{{ $customer->name}}</td>
				<td>
					@foreach($i_detail as $id)
						<?php
							$pro = DB::table('products')->where('id',$id->pro_id)->first();
						 ?>
						 {{$pro->name}} - SL: {{$id->quantity}}<br>
					@endforeach
				</td>
				<td>{{number_format($i->sum,0,'','.')}}</td>

				<td>
					<?php
						echo Carbon\Carbon::createFromTimeStamp(strtotime($i->created_at))->diffForHumans();;
					?>
				</td>
				<td>
					<a href="{{ route('backend.order-delete',['id'=> $i->id]) }}" title="Xóa đơn hàng" onclick="return confirm('Bạn muốn xóa đơn hàng này')"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
					<a href="{{ route('backend.order-detail',['id'=> $i->id]) }}" title="Chi tiết" ><span class="glyphicon glyphicon-info-sign" style="color: green"></span></a>
				</td>
			</tr>
		@endforeach
		</tbody>
		<tfoot>
		<tr>
			<th>ID</th>
  		  <th>Khách hàng</th>
  		  <th>Thông tin đơn hàng</th>
  		  <th>Tổng đơn hàng</th>
  		  <th>Thời gian lập</th>
  		  <th>Tác vụ</th>
		</tr>
		</tfoot>
	</table>

@stop()
