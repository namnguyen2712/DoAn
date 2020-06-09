@extends('layouts.backend')
@section('title','NHẬP HÀNG')
@section('box-title','Phiếu nhập')

@section('box-body')
	<!-- <form  method="POST" role="form"> -->

		<div class="form-group">
			<div class="row invoice-info">
			  <div class="col-sm-4 invoice-col">
				Đơn vị cung cấp:
				<address>
				  <strong>{{ $supply->name }}</strong><br>
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
		<h4 style="margin:35px 0px;">DANH SÁCH SẢN PHẨM</h4>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên sản phẩm</th>
					<th>Số lượng</th>
					<th>Giá nhập</th>
					<th>Thành tiền</th>
					<th></th>
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
				<form action="{{route('backend.update-import')}}" class="form-inline" method="get">
					<td>
	                    <div class="form-group">
                       	<input type="number" name="quantity" value="{{ old('quantity',isset($item['quantity']) ? $item['quantity'] : old('quantity')) }}">
		            </td>
		            <td>
                       <input type="number" name="price" value="{{ old('price',isset($item['price']) ? $item['price'] : old('price')) }}">
                       <button type="submit" class="btn btn-success" style="padding: 2px 9px; margin-left: 10px;">Cập nhật</button>
                       <input type="hidden" name="id" value="{{$item['id']}}">
                       <input type="hidden" name="s_id" value="{{$supply->id}}">
					</td>
                </form>
					<td>{{ number_format($tt,0,'','.') }}đ</td>
					<td>
	                    <a href="{{ route('backend.remove-import',['id'=>$item['id'],'s_id'=> $supply->id]) }}" title="Xóa sản phẩm này" onclick="return confirm('Bạn muốn xóa sản phẩm này?')"><i class="glyphicon glyphicon-remove" style="color: red;"></i></a>
	                </td>
				</tr>
			@endforeach
		@endif
			</tbody>
			<tfoot>
	            <tr>
	                <th colspan="2" style="text-align: center; font-size: 20px;">Tổng cộng</th>
	                <th><span style="font-size: 20px;">{{number_format($cart->quanti(),0,'','.')}}</span></th>
	                <th></th>
	                <th><span style="font-size: 20px;">{{number_format($cart->total(),0,'','.')}}đ</span></th>
	                <th><a href="{{ route('backend.clear-import',['s_id'=> $supply->id]) }}" class="btn btn-danger" title="Xóa toàn bộ sản phẩm" onclick="return confirm('Bạn muốn xóa toàn bộ giỏ hàng?')"><i class="glyphicon glyphicon-trash" style="font-size: 20px;"></i></a></th>
	            </tr>
	        </tfoot>
		</table>

		<div class="row no-print">
			<div class="col-xs-12">
	        	<a href="{{ route('backend.import-add-product',['s_id'=> $supply->id]) }}" class="btn btn-primary pull-right" style="margin-right: 5px; ">Thêm sản phẩm</a>
	        	<a href="{{ route('backend.import-create',['s_id'=>$supply->id]) }}" class="btn btn-success pull-right" style="margin-right: 5px; ">Xác nhận</a>
	    	</div>
		</div>
	<!-- </form> -->

@stop()
