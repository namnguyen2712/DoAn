@extends('layouts.backend')
@section('title','PHIẾU NHẬP')
@section('box-title')
<div class="container">
	<a href="{{route('backend.import')}}" title=""><span class="glyphicon glyphicon-menu-left"></span>Trở về</a>
</div>
@stop()
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
	 $supply=DB::table('supply')->select('name','address','phone','email')->where('id',$import->id_supply)->first();
	 $user=DB::table('user')->select('full_name')->where('id',$import->id_employee)->first();

 ?>
	<div class="" style="">
		<div class="text-center" style="margin-bottom: 50px;">
			<h2>PHIẾU NHẬP HÀNG</h2>
			<h4>{{date('d/m/Y ', strtotime($import->created_at))}}</h4>
		</div>

		<div class="text-left">

			<div class="row invoice-info">
			  <div class="col-sm-4 invoice-col">
				Đơn vị cung cấp:
				<address>
				  <strong>{{ $supply->name }}</strong><br>
				  Địa chỉ:{{ $supply->address }}<br>
				  Số điện thoại: {{ $supply->phone }}<br>
				  Email: {{$supply->email}}
				</address>

			  </div>

			  <!-- /.col -->
			  <div class="col-sm-4 invoice-col">
				<b>Mã phiếu nhập số: {{$import->id}}</b><br>
				<b>Ngày:</b>  {{date('d/m/Y ', strtotime($import->created_at))}}<br>
				<b>Mã nhà cung cấp:{{$import->id_supply}}</b>
			  </div>
			  <!-- /.col -->
			</div>
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
					$totalqty=0;
				?>

                @foreach($importDetails  as $importDetail)
				<?php
				 $product=DB::table('products')->select('name')->where('id',$importDetail->pro_id)->first();
				?>
        			<tr>
        				<td>{{$stt++}}</td>
        				<td>{{$product->name}}</td>
        				<td>{{$importDetail->quantity}}</td>
        				<td>{{number_format($importDetail->price)}} VND</td>
        				<td>
        					<?php
        					$qty = $importDetail->quantity;
        					$price = $importDetail->price;
        					$subtotal = $qty * $price;
        					$total += $subtotal;
							$totalqty+=$qty;
        					?>
        					{{number_format($subtotal)}} VND
        				</td>

        			</tr>

        		@endforeach
			</tbody>
			<tfoot>
	            <tr>
	                <th colspan="2" style="font-size: 16px;">Tổng cộng:</th>
	                <th style="font-size: 16px;">{{number_format($totalqty)}}</th>
					<th colspan="1" style="font-size: 16px;"></th>
					<th style="font-size: 16px;">{{number_format($total)}} VND</th>

	            </tr>
	        </tfoot>
		</table>


		<div class="sign">
			<div class="col-md-12">
				<div class="text-center">
					<h4 style="margin: 30px 0px 110px 0px">Nhân viên lập</h4>
					<h4> {{ $user->full_name }}</h4>
				</div>
			</div>

		</div>
	</div>

</form>
</body>

@stop()
