@extends('layouts.backend')
@section('title','Phân quyền')
@section('box-title','Chọn người dùng')

@section('box-body')

<table class="table table-hover">
    <h3>Thêm nhân viên vào quyền :{{$r->name}}</h3>
	<thead>
		<tr>
			<th>ID</th>
			<th>Tên tài khoản</th>
			<th>Họ tên</th>
			<th>Địa chỉ</th>
			<th>Số điện thoại</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($user as $user)
		<tr>
			<td>
				{{ $user->id }}
			</td>
			<td>
				{{ $user->username }}
			</td>
			<td>
				{{ $user->full_name }}
			</td>
			<td>
				{{ $user->address }}
			</td>
			<td>
				{{ $user->phone }}
			</td>
			<td>
				<a href="{{route('backend.post-user',['role_id'=>$r->id,'$user_id'=> $user->id])}}" class="btn btn-primary">Chọn</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop()
