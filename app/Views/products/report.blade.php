@extends('layouts.backend')
@section('title','THỐNG KÊ HÀNG CÒN TRONG KHO')
@section('box-body')

<table class="table table-hover">
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
