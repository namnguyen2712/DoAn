@extends('layouts.backend')
@section('title','QUẢN LÝ CHỨC NĂNG HỆ THỐNG')
@section('box-body')

<a href="{{route('backend.permission-create')}}" class="btn btn-success"  style="margin: 10px 0px 15px 0px ">
	<i class="fa fa-plus"></i> <span>Thêm mới chức năng</span>
</a>

				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Mã chức năng</th>
							<th>Đường dẫn</th>
							<th>Hành động</th>
							<th>Tác vụ</th>
						</tr>
					</thead>
					<tbody>
                        @foreach($permissions as $permission)
                    			     <tr>
                    				<td>{{ $permission->id }}</td>
                    				<td>{{ $permission->name }}</td>
                    				<td>{{ $permission->display_name }}</td>
                    				<td>
                    					<a href="{{ route('backend.permission-delete',[$permission->id])}}"  onclick="return confirm('Bạn muốn xóa chức năng này')" title="Xóa"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
                    				</td>
                    			</tr>
                    	@endforeach()
					</tbody>
					<tfoot>
	                <tr>
						<th>Mã chức năng</th>
  					  <th>Đường dẫn</th>
  					  <th>Hành động</th>
  					  <th>Tác vụ</th>
	                </tr>
	                </tfoot>
				</table>




			<div class="text-center">
				{{ $permissions->links() }}
			</div>

@stop
