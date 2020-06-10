@extends('layouts.backend')
@section('title','QUẢN LÝ NHẬP HÀNG')
@section('box-title','Danh sách phiếu nhập')

@section('box-body')
<div class="col-lg-3 row">
	<a href="{{ route('backend.import-add-supply') }}" title="Tạo hóa đơn" class="btn btn-success" style="margin: 10px 0px 15px 0px ">
		<i class="fa fa-plus"></i> <span>Tạo phiếu nhập hàng</span>
	</a>
</div>
<div class="col-lg-9">
	<a href="" title="Tạo hóa đơn" class="btn btn-success" style="margin: 10px 0px 15px 0px ">
		<i class="fa fa-plus"></i> <span>Xuất file Excel</span>
	</a>
</div>
<div class=" col-lg-5 row">
	<form action="{{route('backend.import-get-date')}}" method="GET">
			<input type="date" class="form-control" name="date"  >
</div>
<div class="col-lg-1 ">
	<button type="submit" class="btn btn-success" name="button">Nạp</button>
</div>
	</form>

	<div class=" col-lg-5 row">
		<form action="{{route('backend.import-get-month')}}" method="GET">
			<select class="form-control" name="month" required>
				<option value="">Chọn tháng</option>
				<option value="1" >
					Tháng 1
				</option>
				<option value="2" >
					Tháng 2
				</option>
				<option value="3" >
					Tháng 3
				</option>
				<option value="4" >
					Tháng 4
				</option>
				<option value="5" >
					Tháng 5
				</option>
				<option value="6" >
					Tháng 6
				</option>
				<option value="7" >
					Tháng 7
				</option>
				<option value="8" >
					Tháng 8
				</option>
				<option value="9" >
					Tháng 9
				</option>
				<option value="10" >
					Tháng 10
				</option>
				<option value="11" >
					Tháng 11
				</option>
				<option value="12" >
					Tháng 12
				</option>
			</select>
	</div>
	<div class="col-lg-1 ">
		<button type="submit" class="btn btn-success" name="button">Nạp</button>
	</div>
		</form>
<div class="col-lg-12 row box-body">
	<div class="col-lg-4">
		<form  action="{{route('backend.search-supply-import')}}" method="GET">
			<input type="text" name="name_supply" class="form-control" placeholder="Nhập tên nhà cung cấp cần tìm kiếm">
		</form>
	</div>
	<div class="col-lg-4">
		<form  action="{{route('backend.search-employee-import')}}" method="GET">
			<input type="text" class="form-control" name="name_employee" placeholder="Nhập tên nhân viên lập cần tìm kiếm">
		</form>
	</div>
	<div class="col-lg-4">
		<form  action="{{route('backend.search-import')}}" method="GET">
			<input type="text" class="form-control" name="id" placeholder="Nhập số phiếu nhập cần tìm kiếm">
		</form>
	</div>
</div>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Số</th>
				<th>Nhà cung cấp</th>
				<th>Nhân viên lập</th>
				<th>Thông tin đơn hàng</th>
				<th>Tổng đơn hàng</th>
				<th>Thời gian lập</th>
				<th>Tác vụ</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sum_i = 0;
			 ?>

			@foreach ($import as $i)
			<?php
				$i_detail = DB::table('import_detail')->where('id_import',$i->id)->get();
				$supply = DB::table('supply')->where('id',$i->id_supply)->first();
				$employee = DB::table('user')->where('id',$i->id_employee)->first();
				$sum_i = $sum_i + $i->sum;
			 ?>

			<tr>
				<td>{{ $i->id }}</td>
				<td>{{ $supply->name }}</td>
				<td>{{$employee->username}}</td>
				<td>
					@foreach($i_detail as $id)
						<?php
							$pro = DB::table('products')->where('id',$id->pro_id)->first();
						 ?>
						 {{$pro->name}} - SL: {{$id->quantity}}<br>
					@endforeach
				</td>
				<td>{{ number_format($i->sum)}}</td>
				<td>
					{{date('d/m/Y ', strtotime($i->created_at))}}
				</td>
				<td>
					<a href="{{ route('backend.import-delete',['id'=> $i->id]) }}" title="Xóa đơn hàng" onclick="return confirm('Bạn muốn xóa đơn hàng này')"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
					<a href="{{ route('backend.import-detail',['id'=> $i->id]) }}" title="Chi tiết" ><span class="glyphicon glyphicon-info-sign" style="color: green"></span></a>
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
		<tfoot>
		<tr>
			<th>Số</th>
  		  <th>Nhà cung cấp</th>
  		  <th>Nhân viên lập</th>
  		  <th>Thông tin đơn hàng</th>
  		  <th>Tổng đơn hàng</th>
  		  <th>Thời gian lập</th>
  		  <th>Tác vụ</th>
		</tr>
		</tfoot>
	</table>
	<div class="text-center">
		{{ $import->links() }}
	</div>


@stop()
