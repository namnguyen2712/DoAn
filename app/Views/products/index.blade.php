@extends('layouts.backend')
@section('title','QUẢN LÝ SẢN PHẨM')
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
	  $checkPermissionAddProduct =  DB::table('permissions')->where('name','product-create')->value('id');
	  $checkPermissionEditProduct =  DB::table('permissions')->where('name','product-edit')->value('id');
	  $checkPermissionDeleteProduct =  DB::table('permissions')->where('name','product-delete')->value('id');
  ?>
	@if($listRoleOfUser->contains($checkPermissionAddProduct))

	<a href="{{route('backend.products-create')}}" class="btn btn-success" style="margin: 10px 0px 15px 0px ">
		<i class="fa fa-plus"></i> <span>Thêm mới sản phẩm</span>
	</a>
	@endif
	<a href="{{route('backend.products-report')}}" class="btn btn-success" style="margin: 10px 0px 15px 0px ">
		<i class="fa fa-flag-checkered"></i> <span>Báo cáo hàng tồn kho</span>
	</a>
	<div class="form-group">
		<form action="{{route('backend.search-product')}}" method="GET">
		  <input type="text" class="form-control" name="name"  placeholder="Nhập tên sản phẩm cần tìm kiếm">
		</form>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          Lọc sản phẩm
                        </button>

			<ul class="dropdown-menu">
              <li><a href="{{route('backend.product-nameasc')}}">Tên, A đến Z</a></li>
              <li><a href="{{route('backend.product-namedesc')}}">Tên, Z đến A</a></li>
              <li><a href="{{route('backend.product-priceasc')}}">Giá, thấp đến cao</a></li>
              <li><a href="{{route('backend.product-pricedesc')}}">Giá, cao đến thấp</a></li>
            </ul>
		</div>

		</div>
	</div>
	<div class="box-body">
		<p>Tổng số: <b>{{$products->count('id') }}</b> bản ghi </p>

	</div>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Tên sản phẩm</th>
			<th>Loại sản phẩm</th>
			<th>Đơn vị</th>
			<th>Giá</th>
			<th>Xuất xứ</th>
			<th>Ảnh</th>
			<th>SL hàng trong kho</th>
			<th>Tác vụ</th>

		</tr>
	</thead>
	<tbody>

		@foreach($products as $pro)
		<tr>
			<td>{{$pro->name}}</td>
			<?php
				$cat=DB::table('category')->select('name')->where('id',$pro->cat_id)->first();
				$nation=DB::table('nation')->select('name')->where('id',$pro->nation_id)->first();
				$unit=DB::table('unit')->select('name')->where('id',$pro->unit_id)->first();

			?>
			<td>{{$cat->name}}</td>
			<td>{{$unit->name}}</td>
			<td>{{ number_format($pro->price)}}</td>
			<td>{{$nation->name}}</td>
			<td><img src="{{ url('/')}}/public/img/{{ $pro->images1 }}" style="width: 50px; height: 60px;"></td>

			<td>{{$pro->quantity}}</td>
			<td>
				@if($listRoleOfUser->contains($checkPermissionEditProduct))
				<a href="{{route('backend.products-edit',[$pro->id])}}'"  ><span class="glyphicon glyphicon-pencil" style="color: green"></span></a>
				@endif
				@if($listRoleOfUser->contains($checkPermissionDeleteProduct))
				<a href="{{ route('backend.products-delete',[$pro->id])}}"  onclick="return confirm('Bạn muốn xóa sản phẩm này')" title="Xóa"><span class="glyphicon glyphicon-trash" style="color: red"></span></a>
				@endif
			</td>

		</tr>
		@endforeach()

	</tbody>

</table>
<div class="text-center">
	{{ $products->links() }}
</div>


@stop
