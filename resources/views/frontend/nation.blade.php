@extends('layouts.index')

@section('main')
<div class="site-section">
	<div class="container">
		<div class="row">
		  <div class="col-lg-12">
		    <p>Quốc gia/{{$nation->name}}</p>
		  </div>
		</div>
        <div class="row">
          <div class="col-lg-6">
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
          <div class="col-lg-6">
			  <h3 class="mb-3 h6 text-uppercase text-black d-block">Xuất xứ</h3>
  			<button type="button" class="btn btn-secondary btn-md dropdown-toggle px-4" id="dropdownMenuReference"
  			data-toggle="dropdown">Xuất xứ</button>
  			<div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
				<a class="dropdown-item" href="#">Xuất xứ</a>
				<?php $nation=DB::table('nation')->get()  ?>
				@foreach($nation as $n)
				<a class="dropdown-item" href="{{route('xuatxu',['id'=>$n->id])}}">{{ucwords($n->name)}}
					<span>({{App\Models\Products::where('nation_id',$n->id)->count()}})</a>
				<!-- <li class="filter-list"><input class="" class="pixel-radio try" type="checkbox"  id="nation_id" value="{{$n->id}}" >
					<label> </span>
					</label>
				</li> -->
				@endforeach

  			</div>
          </div>
        </div>
		<div class="row">
			@foreach($products as $pro)
			<div class="col-sm-6 col-lg-4 text-center item mb-4">
				<a href="{{route('detail',['id'=>$pro->id])}}"> <img src="{{ url('/')}}/public/img/{{ $pro->images1 }}" alt="Image"></a>
				<h3 class="text-dark"><a href="{{route('detail',['id'=>$pro->id])}}">{{$pro->name}}</a></h3>
				<p class="price">{{ number_format($pro->price,0,'',',')}} Đ</p>
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
