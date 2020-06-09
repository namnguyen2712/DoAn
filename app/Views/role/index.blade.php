@extends('layouts.backend')
@section('title','NHÓM QUYỀN')
@section('box-title','Danh sách nhóm quyền')
@section('box-body')

				<a href="{{route('backend.role-create')}}" class="btn btn-success"  style="margin: 10px 0px 15px 0px ">
					<i class="fa fa-plus"></i> <span>Thêm mới nhóm quyền</span>
				</a>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Mã</th>
							<th>Tên nhóm quyền</th>
							<th>Tác vụ</th>
						</tr>
					</thead>
					<tbody>
                    	@foreach($role as $role)
                    			     <tr>
                    				<td>{{ $role->id }}</td>
                    				<td>{{ $role->name }}</td>
                    				<td>
										<a href="{{ route('backend.add-user',[$role->id])}}"   title="Thêm người dùng vào nhóm quyền"><span class="ion ion-person-add" style="color: green"></span></a>
										<a href="{{ route('backend.info-user-role',[$role->id])}}"   title="Danh sách nhóm người dùng thuộc quyền"><span class="glyphicon glyphicon-info-sign" style="color: blue"></span></a>
                    					<a href="{{ route('backend.role-delete',[$role->id])}}"  onclick="return confirm('Bạn muốn xóa danh mục này')" title="Xóa"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                    				</td>
                    			</tr>
                    	@endforeach()
					</tbody>
					<tfoot>
	                <tr>
						<th>Mã</th>
  					  <th>Tên nhóm quyền</th>
  					  <th>Tác vụ</th>
	                </tr>
	                </tfoot>
				</table>

@stop
