@extends('layouts.backend')
@section('box-title')
@section('box-title')
<div class="container">
	<a href="{{route('backend.role')}}" title=""><span class="glyphicon glyphicon-menu-left"></span>Trở về</a>
</div>
@stop()
@section('box-body')

	<form action="" method="POST" role="form">
		<table class="table table-hover">
			<tbody>
				<tr>
					<td>Tên nhóm quyền <span style="color: red;">*</span></td>
					<td>
						<input type="text" class="form-control"placeholder="Nhập tên nhóm quyền" name="name" >
					</td>
				</tr>


			</tbody>
		</table>


	    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
		<button type="submit" class="btn btn-app"><i class="fa fa-save"></i> Thêm mới</button>
	</form>


@stop()
