@extends('layouts.backend')
@section('title','PHÂN QUYỀN')
@section('box-body')


		<form action="" method="POST" role="form">
			<?php $name = DB::table('roles')->select('name')->where('id',$role->id)->first(); ?>
			<h2 >Phân quyền cho nhóm: {{$name->name}}</h2>
			<div  class="form-group">
				<div class="form-group">
					@foreach($listPermission as $permission)
					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-3">
						<input  name="permissionID[]" type="checkbox" value="{{$permission->id}}" {{$permissionID->contains($permission->id) ? 'checked' : ''}}>
						<span style="text-align: center">{{$permission->display_name}}</span>
					</div>

					@endforeach
				</div>
				<span class="alert-danger">{{$errors->first('name')}}</span>
			</div>


			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
				<button title="Lưu Danh Mục" type="submit" class="mr-2 btn btn-info">Lưu lại</button>
				<a href="{{route('backend.add-role')}}" class="mr-2 btn btn-info"> Quay lại</a>
	            <input type="hidden" name="_token" value="{{csrf_token()}}">
			</div>

		</form>

@stop()
