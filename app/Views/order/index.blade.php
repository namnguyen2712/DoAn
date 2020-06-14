@extends('layouts.backend')
@section('title','QUẢN LÝ BÁN HÀNG')
@section('box-title','Danh sách hóa đơn bán')
@section('box-body')
<div class="col-lg-3 row">
	<a href="{{ route('backend.order-add-supply') }}" title="Tạo hóa đơn" class="btn btn-success" style="margin: 10px 0px 15px 0px ">
		<i class="fa fa-plus"></i> <span>Tạo mới hóa đơn bán</span>
	</a>
</div>
<div class="col-lg-9">
	<a href="" title="Xuất báo cáo" id="saveAsExcelOrder" class="btn btn-success" style="margin: 10px 0px 15px 0px ">
		<i class="fa fa-plus"></i> <span>Xuất file Excel</span>
	</a>
</div>
<div class=" col-lg-5 row">
	<form action="{{route('backend.order-get-date')}}" method="GET">
			<input type="date" class="form-control" name="date"  >
</div>
<div class="col-lg-1 ">
	<button type="submit" class="btn btn-success" name="button">Nạp</button>
</div>
	</form>

	<div class=" col-lg-5 row">
		<form action="{{route('backend.order-get-month')}}" method="GET">
			<select name="month"  class="form-control" required>
				<option value="">Chọn tháng</option>

				<?php
				    for($i = 1; $i < 13; $i++) {
				        echo "<option value='$i'>Tháng $i</option>";
				    }
				?>

		    </select>
	</div>
	<div class="col-lg-1 ">
		<button type="submit" class="btn btn-success" name="button">Nạp</button>
	</div>
		</form>
<div class="col-lg-12 row box-body">
	<div class="col-lg-4">
		<form  action="{{route('backend.search-customer-order')}}" method="GET">
			<input type="text" name="phone_customer" class="form-control" placeholder="Nhập số điện thoại khách hàng cần tìm kiếm">
		</form>
	</div>
	<div class="col-lg-4">
		<form  action="{{route('backend.search-employee-order')}}" method="GET">
			<input type="text" class="form-control" name="name_employee" placeholder="Nhập tên nhân viên lập cần tìm kiếm">
		</form>
	</div>
	<div class="col-lg-4">
		<form  action="{{route('backend.search-order')}}" method="GET">
			<input type="text" class="form-control" name="id" placeholder="Nhập số hóa cần tìm kiếm">
		</form>
	</div>
</div>

	<table id="list-order" class="table table-hover">
		<tr>
			<td colspan="7"> <div class="hidden">
				Báo cáo hóa đơn bán hàng hóa
			</div> </td>
		</tr>
		<thead>
			<tr>
				<th>Số</th>
				<th>Khách hàng</th>
				<th>Thông tin đơn hàng</th>
				<th>Hình thức</th>
				<th>Tổng đơn hàng</th>
				<th>Nhân viên lập</th>
				<th>Thời gian lập</th>
				<th>Tác vụ</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sum_i = 0;
			 ?>
			@foreach ($order as $i)
			<?php
				$i_detail = DB::table('order_detail')->where('order_id',$i->id)->get();
				$customer = DB::table('customer')->where('id',$i->cus_id)->first();
				$employee = DB::table('user')->where('id',$i->employee_id)->first();
				$sum_i = $sum_i + $i->sum;
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
				<td>
					<?php if($i->type ==1){
						echo "Bán thuốc theo đơn";
					}
					else {
						echo "Thuốc bán lẻ";
					} ?>
				</td>
				<td>{{ number_format($i->sum)}}</td>

				<td>{{$employee->username}}</td>
				<td>
					{{date('d/m/Y ', strtotime($i->created_at))}}
				</td>
				<td>
					<a href="{{ route('backend.order-delete',['id'=> $i->id]) }}" title="Xóa đơn hàng" onclick="return confirm('Bạn muốn xóa đơn hàng này')"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
					<a href="{{ route('backend.order-detail',['id'=> $i->id]) }}" title="Chi tiết" ><span class="glyphicon glyphicon-info-sign" style="color: green"></span></a>
				</td>
			</tr>
		@endforeach
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>Tổng:{{ number_format($sum_i)}}</td>
			<td></td>
			<td></td>
		</tr>
		</tbody>

	</table>
	<div class="text-center">
		{{ $order->links() }}
	</div>
@stop()
