@extends('layouts.backend')
@section('title','QUẢN LÝ NHẬP HÀNG')
@section('box-title','Danh sách phiếu nhập')

@section('box-body')
<?php
	$roleUser = DB::table('user')
	->join('user_roles','user.id','=','user_roles.user_id')
	->join('roles','user_roles.role_id','=','roles.id')
	->where('user.id','=',Auth()->guard('admin')->user()->id)
	->select('*')
	->first();
	$listRoleOfUser = DB::table('user')
	  ->join('user_roles', 'user.id', '=', 'user_roles.user_id')
	  ->join('roles', 'user_roles.role_id', '=', 'roles.id')
	  ->where('user.id',Auth()->guard('admin')->user()->id)
	  ->select('roles.*')
	  ->get()->pluck('id')->toArray();

	  $listRoleOfUser = DB::table('roles')
	  ->join('roles_permissions', 'roles.id', '=', 'roles_permissions.role_id')
	  ->join('permissions','roles_permissions.permission_id', '=', 'permissions.id')
	  ->whereIn('roles.id',$listRoleOfUser) // lấy giá trị tại id
	  ->select('permissions.*')
	  ->get()->pluck('id')->unique();
	  $checkPermissionAddImport =  DB::table('permissions')->where('name','import-create')->value('id');
	  $checkPermissionDeleteImport =  DB::table('permissions')->where('name','import-delete')->value('id');
  ?>
<div class="col-lg-12">


<div class="row">
	@if($listRoleOfUser->contains($checkPermissionAddImport))
	<a href="{{ route('backend.import-add-supply') }}" title="Tạo hóa đơn" class="btn btn-success" style="margin: 10px 0px 15px 0px ">
		<i class="fa fa-plus"></i> <span>Tạo phiếu nhập hàng</span>
	</a>
	@endif

	<a href="" title="Xuất excel báo cáo" class="btn btn-success" id="saveAsExcelImport" style="margin: 10px 0px 15px 0px ">
		<i class="fa fa-file-excel-o"></i> <span>Xuất file Excel</span>
	</a>
</div>
</div>
<div class="col-lg-12 row">


<div class=" col-lg-5 row">
	<form action="{{route('backend.import-get-date')}}" method="GET">
			<input type="date" class="form-control" name="date"  >
</div>
<div class="col-lg-1 ">
	<button type="submit" class="btn btn-success" name="button">Nạp</button>
</div>
	</form>

	<div class=" col-lg-5 row">
		<form action="{{route('backend.import-get-month')}}" method="GET">
			<select name="month"  class="form-control" required>
				<option value="">Chọn tháng</option>

				<?php
				    for($i = 1; $i < 13; $i++) {
				        echo "<option value='$i'>Tháng $i</option>";
				    }
				?>

		    </select>

	</div>
	<div class="col-lg-1 ">
		<button type="submit" class="btn btn-success" name="button">Nạp</button>
	</div>
		</form>
		</div>
<div class="col-lg-12 row box-body">
	<div class="col-lg-4">
		<form  action="{{route('backend.search-supply-import')}}" method="GET">
			<input type="text" name="name_supply" class="form-control" placeholder="Nhập tên nhà cung cấp cần tìm kiếm">
		</form>
	</div>
	<div class="col-lg-4">
		<form  action="{{route('backend.search-employee-import')}}" method="GET">
			<input type="text" class="form-control" name="name_employee" placeholder="Nhập tên nhân viên lập cần tìm kiếm">
		</form>
	</div>
	<div class="col-lg-4">
		<form  action="{{route('backend.search-import')}}" method="GET">
			<input type="text" class="form-control" name="id" placeholder="Nhập số phiếu nhập cần tìm kiếm">
		</form>
	</div>
</div>
<p>Tổng số: <b>{{$import->count('id') }}</b> bản ghi </p>
	<table id="list-import" class="table table-hover">
		<tr>
			<td colspan="7"><div class="hidden">
				Báo cáo phiếu nhập kho hàng hóa
			</div></td>
		</tr>
		<thead>
			<tr>
				<th>Số</th>
				<th>Nhà cung cấp</th>
				<th>Nhân viên lập</th>
				<th>Thông tin đơn hàng</th>
				<th>Tổng đơn hàng</th>
				<th>Thời gian lập</th>
				<th>Tác vụ</th>
			</tr>
		</thead>
		<tbody>

			<?php
			$sum_i = 0;
			 ?>

			@foreach ($import as $i)
			<?php
				$i_detail = DB::table('import_detail')->where('id_import',$i->id)->get();
				$supply = DB::table('supply')->where('id',$i->id_supply)->first();
				$employee = DB::table('user')->where('id',$i->id_employee)->first();
				$sum_i = $sum_i + $i->sum;
			 ?>

			<tr>
				<td>{{ $i->id }}</td>
				<td>{{ $supply->name }}</td>
				<td>{{$employee->username}}</td>
				<td>
					@foreach($i_detail as $id)
						<?php
							$pro = DB::table('products')->where('id',$id->pro_id)->first();
						 ?>
						 {{$pro->name}} - SL: {{$id->quantity}}<br>
					@endforeach
				</td>
				<td>{{ number_format($i->sum)}}</td>
				<td>
					{{date('d/m/Y ', strtotime($i->created_at))}}
				</td>
				<td>
					@if($listRoleOfUser->contains($checkPermissionDeleteImport))
					<a href="{{ route('backend.import-delete',['id'=> $i->id]) }}" title="Xóa đơn hàng" onclick="return confirm('Bạn muốn xóa đơn hàng này')"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
					@endif
					<a href="{{ route('backend.import-detail',['id'=> $i->id]) }}" title="Chi tiết" ><span class="glyphicon glyphicon-info-sign" style="color: green"></span></a>
				</td>

			</tr>
		@endforeach
			<tr>
				<td></td>
		  		<td></td>
		  		<td></td>
		  		<td></td>
		  		<td>Tổng:{{ number_format($sum_i)}}</td>
		  		<td></td>
		  		<td></td>
			</tr>
		</tbody>

	</table>
	<div class="text-center">
		{{ $import->links() }}
	</div>


@stop()
