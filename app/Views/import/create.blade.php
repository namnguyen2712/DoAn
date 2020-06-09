@extends('layouts.backend')
@section('title','HÓA ĐƠN')
@section('box-body')
<body onload="window.print();">
<form  method="POST" role="form">
<?php $days = date('d');
	$months = date('m');
	$years = date('Y');
 ?>
 <style type="text/css">
 	.table > thead > tr > th{
		border-bottom: 1px solid grey;
 	}
 	.table>tbody>tr>td,
 	.table > tfoot > tr > th{
 		border-top: 1px solid grey;
 	}
 </style>
	<div class="" style="">
		<div class="text-center" style="margin-bottom: 50px;">
			<h2>PHIẾU NHẬP HÀNG</h2>
			<h4>Ngày {{$days}} Tháng {{$months}} Năm {{$years}}</h4>
		</div>

		<div class="text-left">

			<div class="row invoice-info">
			  <div class="col-sm-4 invoice-col">
				Đơn vị cung cấp:
				<address>
				  <strong>{{ $supply->name }}</strong><br>
				  <input type="hidden" name="supply_id" value="{{$supply->id}}"/>
				  Địa chỉ:{{ $supply->address }}<br>
				  {{ $supply->phone }}<br>
				  Email: {{$supply->email}}
				</address>
			  </div>

			  <!-- /.col -->
			  <div class="col-sm-4 invoice-col">
				<b>Mã hóa đơn: #</b><br>
				<b>Ngày:</b>  <?php echo date("d/m/Y"); ?><br>
				<b>Mã nhà cung cấp:</b> {{$supply->id}}
			  </div>
			  <!-- /.col -->
			</div>
		</div>

		<table border="1">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên sản phẩm</th>
					<th>Đơn giá</th>
					<th>Số lượng</th>
					<th>Thành tiền</th>
				</tr>
			</thead>
			<tbody>
		@if(count($cart->items))
		<?php $stt =1; ?>
			@foreach($cart->items as $item)
		        @php
		            $tt = $item['quantity']*$item['price'];
		        @endphp
				<tr>
					<td>{{ $stt }}</td>
					<td>{{ $item['name'] }}</td>
					<td>{{	$item['price'] }}đ</td>
					<td>{{ $item['quantity'] }}</td>
					<td>{{ number_format($tt,0,'','.') }}đ</td>
				</tr>
			@endforeach
		@endif
			</tbody>
			<tfoot>
	            <tr>
	                <th colspan="3" style="font-size: 16px;">Tổng cộng:</th>
	                <th style="font-size: 16px;">{{number_format($cart->quanti(),0,'','.')}}</th>
	                <th style="font-size: 16px;">{{number_format($cart->total(),0,'','.')}}đ</th>
	                <input type="hidden" name="sum" value="{{$cart->total()}}"/>
	            </tr>
	        </tfoot>
		</table>


		<div class="sign">
			<div class="col-md-12">
				<div class="text-center">
					<h4 style="margin: 30px 0px 110px 0px">Nhân viên</h4>
					<h4> {{ Auth::user()->full_name }}</h4>
				</div>
			</div>
		<input type="hidden" name="employee_id" value="{{Auth::user()->id}}"/>
		</div>
	</div>
	<div class="text-center" style="margin: 40px 0px;">
		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		<button type="submit">Xác nhận</button>
	</div>
</form>
</body>
<a href="{{ route('backend.import-reciept',['s_id'=>$supply->id]) }}">Trở về giỏ hàng</a>
@stop()
