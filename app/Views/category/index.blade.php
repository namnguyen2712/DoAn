@extends('layouts.backend')
@section('title','QUẢN LÝ DANH MỤC')
@section('box-body')

<a href="{{route('backend.category-create')}}" class="btn btn-success"  style="margin: 10px 0px 15px 0px ">
	<i class="fa fa-plus"></i> <span>Thêm mới danh mục</span>
</a>

				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Mã danh mục</th>
							<th>Tên danh mục</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody id="tbody-category">

					</tbody>
					
				</table>


@stop
