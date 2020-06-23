@extends('layouts.backend')
@section('title','BÁO CÁO')
@section('box-title','Danh sách hóa đơn bán hàng')

@section('box-body')
<div class="col-lg-12 row">
    <a href="" title="Xuất excel báo cáo" class="btn btn-success" id="saveAsExcelReport" style="margin: 10px 0px 15px 0px ">
        <i class="fa fa-file-excel-o"></i> <span>Xuất file Excel</span>
    </a>
</div>
<div class="col-lg-12 row box-body">

<div class=" col-lg-5 row">
	<form action="{{route('backend.sale-order-get-date')}}" method="GET">
			<input type="date" class="form-control" name="date"  >
</div>
<div class="col-lg-1 ">
	<button type="submit" class="btn btn-success" name="button">Nạp</button>
</div>
	</form>

	<div class=" col-lg-5 row">
		<form action="{{route('backend.sale-order-get-month')}}" method="GET">
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
    </div>
    <div class="row box-body">

    <div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{number_format($order->sum('sum'))  }}VNĐ</h3>

          <p>Doanh thu</p>
        </div>
        <div class="icon">
          <i class="fa fa-money"></i>

        </div>

      </div>
    </div>
    <div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{$order->count('id')}}</h3>

          <p>Hóa đơn bán</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>

      </div>
    </div>
</div>
        <table id="list-order-employee" class="table table-hover">
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
@stop
