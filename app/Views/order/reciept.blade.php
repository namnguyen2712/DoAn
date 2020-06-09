@extends('layouts.backend')
@section('title','ĐƠN HÀNG')
@section('box-title','Thông tin hóa đơn')

@section('box-body')
	<!-- <form  method="POST" role="form"> -->

		<div class="form-group">
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
		</div>
		<h4 style="margin:35px 0px;">DANH SÁCH SẢN PHẨM</h4>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên sản phẩm</th>
					<th>Số lượng</th>
					<th></th>
					<th>Giá bán</th>
					<th>Thành tiền</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
		@if(count($cart->items))
		@php $stt =1; @endphp
			@foreach($cart->items as $item)
		        @php
		            $tt = $item['quantity']*$item['price'];
		        @endphp
				<tr>
					<td>{{ $stt }}</td>
					<td>{{ $item['name'] }}</td>
				<form action="{{route('backend.update-order')}}" class="form-inline">
					<td>
                       	<input type="number" name="quantity" value="{{ old('quantity',isset($item['quantity']) ? $item['quantity'] : old('quantity')) }}">
		            </td>
		            <td>
						<input type="hidden" name="price" value="{{$item['price']}}">
                       <button type="submit" class="btn btn-success" style="padding: 2px 9px; margin-left: 10px;">Cập nhật</button>
                       <input type="hidden" name="id" value="{{$item['id']}}">
                       <input type="hidden" name="s_id" value="{{$customer->id}}">
					</td>

                </form>
					<td>{{number_format($item['price'],0,'','.')}}đ</td>
					<td>{{ number_format($tt,0,'','.') }}đ</td>
					<td>
	                    <a href="{{ route('backend.remove-order',['id'=>$item['id'],'s_id'=> $customer->id]) }}" title="Xóa sản phẩm này" onclick="return confirm('Bạn muốn xóa sản phẩm này?')"><i class="glyphicon glyphicon-remove" style="color: red;"></i></a>
	                </td>
				</tr>
				@php $stt++ @endphp
			@endforeach
		@endif
			</tbody>
			<tfoot>
	            <tr>
	                <th colspan="2" style="text-align: center; font-size: 20px;">Tổng cộng</th>
	                <th><span style="font-size: 20px;">{{number_format($cart->quanti(),0,'','.')}}</span></th>
	                <th></th>
	                <th></th>
	                <th><span style="font-size: 20px;">{{number_format($cart->total(),0,'','.')}}đ</span></th>
	                <th><a href="{{ route('backend.clear-order',['s_id'=> $customer->id]) }}" class="btn btn-danger" title="Xóa toàn bộ sản phẩm" onclick="return confirm('Bạn muốn xóa toàn bộ giỏ hàng?')"><i class="glyphicon glyphicon-trash" style="font-size: 20px;"></i></a></th>
	            </tr>
	        </tfoot>
		</table>


		<div class="row no-print">
		  <div class="col-xs-12">
			<a href="{{ route('backend.order-create',['s_id'=>$customer->id]) }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> In</a>
			<a href="{{ route('backend.order-create',['s_id'=>$customer->id]) }}" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Xác nhận đơn hàng</a>
			<a href="{{ route('backend.order-add-product',['s_id'=> $customer->id]) }}" class="btn btn-primary pull-right" style="margin-right: 5px; "><i class="fa fa-download"></i> Thêm sản phẩm</a>
		  </div>
		</div>
	<!-- </form> -->

@stop()
