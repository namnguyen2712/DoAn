@extends('layouts.backend')
@section('box-tittle')
@stop()
@section('box-body')
<div class=" row">
	<div class="col-md-6 push-2">
		<form action="" method="POST" role="form">
			<h2></h2>
			<label for="">Phân quyền cho nhóm</label>

			<div  class="form-group">
				<div class="form-group">
					@foreach($permissions as $permission)
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
						<input  name="permissionID[]" type="checkbox" value="{{$permission->id}}"> <span style="text-align: center">{{$permission->display_name}}</span>
					</div>

					@endforeach
				</div>
			</div>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="form-group">
				<div class="row">
					<button title="Lưu" type="submit" class="mr-2 btn btn-info">Lưu lại</button>
				</div>
			</div>

		</form>
	</div>
</div>
@stop()
