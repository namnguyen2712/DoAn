@extends('layouts.backend')
@section('title','QUẢN LÝ QUỐC GIA')
@section('box-body')


					<a href="{{route('backend.nation-create')}} " class="btn btn-success" style="margin: 10px 0px 15px 0px ">
						<i class="fa fa-plus"></i> <span>Thêm mới quốc gia</span>
					</a>

				<table class="table table-hover">
					<thead>
						<tr>
							<th>Mã quốc gia</th>
							<th>Tên quốc gia</th>
						</tr>
					</thead>
					<tbody id="tbody-nation">

					</tbody>
				</table>

@stop
