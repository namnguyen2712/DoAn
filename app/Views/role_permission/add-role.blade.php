@extends('layouts.backend')
@section('title','PHÂN QUYỀN')
@section('box-title','Chọn nhóm quyền')

@section('box-body')

<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tên nhóm quyền</th>
			<th>Phân quyền</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($roles as $r)
		<tr>
			<td>
				{{ $r->id }}
			</td>
			<td>
				{{ $r->name }}
			</td>
			<td>
				<a href="{{ route('backend.role_permission-edit',[$r->id]) }}" class="btn btn-primary">Phân quyền</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop()
