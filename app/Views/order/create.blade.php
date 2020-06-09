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
	<div class="container" >
		<div class="text-center" style="margin-bottom: 50px;">
			<h2>HÓA ĐƠN BÁN HÀNG</h2>
			<h4>Ngày {{$days}} Tháng {{$months}} Năm {{$years}}</h4>
		</div>


		<div class="row invoice-info">
		  <div class="col-sm-4 invoice-col">
			Đơn vị bán hàng:
			<address>
			  <strong>Cửa hàng thuốc tây</strong><br>
			  Địa chỉ:236 Hoàng Quốc Việt<br>
			  SĐT:0869957997<br>
			  Email: chtt@gmail.com
			</address>
		  </div>
		  <!-- /.col -->
		  <div class="col-sm-4 invoice-col">
			Người mua hàng:
			<input type="hidden" name="cus_id" value="{{$customer->id}}"/>
			<address>
			  <strong>Họ tên: {{ $customer->name }}</strong><br>
			  Địa chỉ: {{ $customer->address }}<br>
			  SĐT: {{ $customer->phone }}<br>
			  Email: {{$customer->email}}
			</address>
		  </div>
		  <!-- /.col -->
		  <div class="col-sm-4 invoice-col">
			<b>Mã hóa đơn: #</b><br>
			<b>Ngày:</b>  <?php echo date("d/m/Y"); ?><br>
			<b>Mã khách hàng:</b> {{$customer->id}}
		  </div>
		  <!-- /.col -->
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
					<td>{{ number_format($item['price'],0,'','.') }}</td>
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
			<div class="col-md-6">
				<div class="text-center">
					<h4 style="margin: 30px 0px 110px 0px">Nhân viên bán hàng</h4>
					<h4>{{ Auth::user()->full_name }}</h4>
				</div>
			</div>
			<input type="hidden" name="employee_id" value="{{Auth::user()->id}}"/>
			<div class="col-md-6">
				<div class="text-center">
					<h4 style="margin: 30px 0px 110px 0px">Khách hàng</h4>
					<h4>{{ $customer->name }}</h4>
				</div>
			</div>

		</div>


	</div>
	<div class="text-center" style="margin: 40px 0px;">
		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		<button type="submit">Xác nhận</button>
	</div>
</form>
</body>

@stop()
@section('box-footer')
<div class="container">
	<a href="{{ route('backend.order-reciept',['s_id'=>$customer->id]) }}">Trở về giỏ hàng</a>
</div>
@stop
