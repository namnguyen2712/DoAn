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
					<a class="dropdown-item" href="{{route('pricedesc')}}">Tên, A đến Z</a>
					<a class="dropdown-item" href="{{route('priceasc')}}">Tên, Z đến A</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="{{route('priceasc')}}">Giá, thấp đến cao</a>
					<a class="dropdown-item" href="{{route('pricedesc')}}">Giá, cao đến thấp</a>
				</div>
			</div>
		</div>
		<div class="row">
			@foreach($products as $pro)
			<?php
				$cat=DB::table('category')->select('name')->where('id',$pro->cat_id)->first();
			?>
			<div class="col-sm-6 col-lg-4 text-center item mb-4">

				<a href="{{route('detail',['id'=>$pro->id])}}"> <img src="{{ url('/')}}/public/img/{{ $pro->images1 }}" alt="Image"></a>
				<p>{{$cat->name}}</p>
				<h3 class="text-dark"><a href="{{route('detail',['id'=>$pro->id])}}">{{$pro->name}}</a></h3>
				<p class="price">{{ number_format($pro->price)}} VNĐ</p>
			</div>
			@endforeach
		</div>

			<div class="col-md-12 text-center">
				<div class="site-block-27">
					{{ $products->links() }}
				</div>
			</div>

	</div>


</div>
@stop
