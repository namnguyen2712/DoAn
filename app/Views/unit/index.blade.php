@extends('layouts.backend')
@section('title','QUẢN LÝ ĐƠN VỊ TÍNH')
@section('box-body')


					<a href="{{route('backend.unit-create')}} " class="btn btn-success" style="margin: 10px 0px 15px 0px ">
						<i class="fa fa-plus"></i> <span>Thêm mới đơn vị tính</span>
					</a>

				<table class="table table-hover">
					<thead>
						<tr>
							<th>Mã đơn vị tính</th>
							<th>Tên đơn vị tính</th>
							<th>Tác vụ</th>
						</tr>
					</thead>
					<tbody id="tbody-unit">

					</tbody>
				</table>

@stop
