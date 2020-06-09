@extends('layouts.index')

@section('main')
<div class="site-blocks-cover" style="background-image: url('{{ url('/')}}/public/img/hero_1.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
                <div class="site-block-cover-content text-center">
                    <h2 class="sub-title">sản phẩm an toàn</h2>
                    <h1>pharma</h1>
                    <p>
                        <a href="{{route('sanpham')}}" class="btn btn-primary px-5 py-3">xem thêm</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="title-section text-center col-12">
                <h2 class="text-uppercase">sản phẩm nổi bật</h2>
            </div>
        </div>

        <div class="row">
            @foreach($pro as $pro)
            <?php
				$cat=DB::table('category')->select('name')->where('id',$pro->cat_id)->first();
			?>
            <div class="col-sm-6 col-lg-4 text-center item mb-4 ">
                <a href="{{route('detail',['id'=>$pro->id])}}"> <img src="{{ url('/')}}/public/img/{{ $pro->images1 }}" alt="Image"></a>
                <p>{{$cat->name}}</p>
                <h3 class="text-dark"><a href="{{route('detail',['id'=>$pro->id])}}">{{$pro->name}}</a></h3>
                <p class="price">{{ number_format($pro->price,0,'',',')}} Đ</p>
            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="{{route('sanpham')}}" class="btn btn-primary px-4 py-3">Xem tất cả sản phẩm</a>
            </div>
        </div>
    </div>
</div>


<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="title-section text-center col-12">
                <h2 class="text-uppercase">Sản phẩm mới</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 block-3 products-wrap">
                <div class="nonloop-block-3 owl-carousel">
                    @foreach($pro_top as $pro_top)
                    <div class="text-center item mb-4">
                        <a href="{{route('detail',['id'=>$pro_top->id])}}"> <img src="{{ url('/') }}/public/img/{{ $pro_top->images1 }}" alt="Image"></a>
                        <h3 class="text-dark"><a href="{{route('detail',['id'=>$pro_top->id])}}">{{$pro_top->name}}</a></h3>
                        <p class="price">{{ number_format($pro_top->price,0,'',',')}} Đ</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@stop()
