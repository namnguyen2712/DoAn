@extends('layouts.index')

@section('main')
<div class="site-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="mb-3 h6 text-uppercase text-black d-block">Lọc sản phẩm</h3>
				<button type="button" class="btn btn-secondary btn-md dropdown-toggle px-4" id="dropdownMenuReference"
				data-toggle="dropdown">Lọc sản phẩm</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
					<a class="dropdown-item" href="#">Lọc sản phẩm</a>
					<a class="dropdown-item" href="#">Tên, A đến Z</a>
					<a class="dropdown-item" href="#">Tên, Z đến A</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Giá, thấp đến cao</a>
					<a class="dropdown-item" href="#">Giá, cao đến thấp</a>
				</div>
			</div>
		</div>
		<div class="row">
			@foreach($products as $pro)
			<div class="col-sm-6 col-lg-4 text-center item mb-4">
				<a href="{{route('detail',['id'=>$pro->id])}}"> <img src="{{ url('/')}}/public/img/{{ $pro->images1 }}" alt="Image"></a>
				<h3 class="text-dark"><a href="shop-single.html">{{$pro->name}}</a></h3>
				<p class="price">{{ number_format($pro->price,0,'',',')}} Đ</p>
			</div>
			@endforeach
		</div>
	</div>


</div>
@stop
