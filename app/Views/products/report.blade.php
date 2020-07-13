@extends('layouts.backend')
@section('title','THỐNG KÊ HÀNG CÒN TRONG KHO')
@section('box-body')
<a href="" title="Xuất excel báo cáo" class="btn btn-success" id="saveAsExcelProduct" style="margin: 10px 0px 15px 0px ">
	<i class="fa fa-file-excel-o"></i> <span>Xuất file Excel</span>
</a>
<p>Tổng số: <b>{{$products->count('id') }}</b> bản ghi </p>
<table id="list-product" class="table table-hover">
	<tr>
		<td colspan="3"> <div class="hidden">
			Báo cáo hàng tồn kho
		</div> </td>
	</tr>
	<thead>
		<tr>
			<th>Tên sản phẩm</th>
			<th>Loại sản phẩm</th>
			<th>SL hàng trong kho</th>
		</tr>
	</thead>
	<tbody>

		@foreach($products as $pro)
		<tr>
			<td>{{$pro->name}}</td>
			<?php
				$cat=DB::table('category')->select('name')->where('id',$pro->cat_id)->first();
			?>
			<td>{{$cat->name}}</td>
			<td>{{$pro->quantity}}</td>
		</tr>
		@endforeach()

	</tbody>
</table>



@stop
