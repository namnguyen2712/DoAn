@extends('layouts.backend')
@section('title','HÓA ĐƠN BÁN')
@section('box-body')
<body>
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
 <?php
	 $customer=DB::table('customer')->select('id','name','address','phone','email')->where('id',$order->cus_id)->first();
	 $user=DB::table('user')->select('full_name')->where('id',$order->employee_id)->first();
 ?>
	<div class="" style="">
		<div class="text-center" style="margin-bottom: 50px;">
			<h2>HÓA ĐƠN BÁN HÀNG</h2>
			<p>Liên:</p>
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
			<address>
			  <strong>Tên người mua hàng: {{ $customer->name }}</strong><br>
			  Địa chỉ: {{ $customer->address }}<br>
			  SĐT: {{ $customer->phone }}<br>
			  Email: {{$customer->email}}
			</address>
		  </div>
		  <!-- /.col -->
		  <div class="col-sm-4 invoice-col">
			<b>Mã hóa đơn số: {{$order->id}}</b><br>
			<b>Ngày:</b> {{$order->created_at}}<br>
			
			<b>Mã khách hàng:</b> {{$customer->id}}
		  </div>
		  <!-- /.col -->
		</div>


		<table class="table" border="1">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên sản phẩm</th>
					<th>Số lượng</th>
					<th>Đơn giá</th>
					<th>Thành tiền</th>
				</tr>
			</thead>
			<tbody>
                <?php
					$stt =1;
					$total=0;
					$subtotal=0;
				?>

                @foreach($orderDetails  as $orderDetail)
				<?php
				 $product=DB::table('products')->select('name')->where('id',$orderDetail->pro_id)->first();
				?>
					<tr>
        				<td>{{$stt++}}</td>
        				<td>{{$product->name}}</td>
        				<td>{{$orderDetail->quantity}}</td>
        				<td>{{number_format($orderDetail->price)}} VND</td>
        				<td>
        					<?php
        					$qty = $orderDetail->quantity;
        					$price = $orderDetail->price;
        					$subtotal = $qty * $price;
        					$total += $subtotal;
        					?>
        					{{number_format($subtotal)}} VND
        				</td>

        			</tr>

        		@endforeach
			</tbody>
			<tfoot>
	            <tr>
	                <th colspan="3" style="font-size: 16px;">Tổng cộng:</th>
	                <th style="font-size: 16px;">{{number_format($total)}} VND</th>
	                <th style="font-size: 16px;">{{number_format($total)}} VND</th>

	            </tr>
	        </tfoot>
		</table>


		<div class="sign">
			<div class="col-md-6">
				<div class="text-center">
					<h4 style="margin: 30px 0px 110px 0px">Người bán hàng</h4>
					<i>(Ký, ghi rõ họ tên)</i>
					<h4> {{ $user->full_name }}</h4>
				</div>
			</div>
			<div class="col-md-6">
				<div class="text-center">
					<h4 style="margin: 30px 0px 110px 0px">Người mua hàng</h4>
					<i>(Ký, ghi rõ họ tên)</i>
					<h4> {{ $customer->name }}</h4>
				</div>
			</div>

		</div>
		<div class="sign">
			<div class="col-md-12">
				<div class="text-center">
					<i>(Cần kiểm tra, đối chiếu khi lập, giao, nhận hóa đơn)</i>

				</div>
			</div>


		</div>
	</div>

</form>
</body>

@stop()
