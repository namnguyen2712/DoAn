@extends('layouts.backend')
@section('box-title')
<div class="container">
		<a href="{{route('backend.unit')}}" title=""><span class="glyphicon glyphicon-menu-left"></span>Trở về</a>
	</div>
@stop()
		@section('box-body')
		<form action="" method="POST" role="form">
			<table class="table table-hover">
				<tbody>
					<tr>
						<td>Tên đơn vị tính <span style="color: red;">*</span></td>
						<td>
							<input type="text" name="name"  class="form-control" placeholder="Nhập tên đơn vị tính" >
						</td>
					</tr>
					<tr>
						@if($errors->has('name'))
						<div class="help-block">
							{!!$errors->first('name')!!}
						</div>
						@endif

					</tr>

				</tbody>
			</table>


			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<button type="button" class="btn btn-app" id="btn-unit-create-res"><i class="fa fa-save"></i> Thêm mới</button>

		</form>



@stop()
