@extends('layouts.backend')
@section('box-title')
@section('box-title','Thêm mới')
@stop()
@section('box-body')

	<form  method="POST" role="form">




		<table class="table table-hover">
			<tbody>
				<tr>
					<td>Tên đường dẫn<span style="color: red;">*</span></td>
					<td>
						<input type="text" class="form-control"placeholder="Tên nhóm quyền" name="name">
					</td>
				</tr>
				<tr>
					<td>Tên chức năng hệ thống<span style="color: red;">*</span></td>
					<td>
						<input type="text" class="form-control"placeholder="Chức năng" name="display_name" s>
					</td>
				</tr>


			</tbody>
		</table>

	    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
		<button type="submit" class="btn btn-app"><i class="fa fa-save"></i> Thêm mới</button>
	</form>


@stop()
