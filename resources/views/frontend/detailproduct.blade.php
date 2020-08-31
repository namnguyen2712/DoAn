@extends('layouts.index')

@section('main')


<div class="site-section">
  <div class="container">
	<div class="row">
	  <div class="col-md-5 mr-auto">
		<div class="border text-center">
		  <img src="{{ url('/')}}/public/img/{{ $pro->images1 }}" alt="Image" class="img-fluid p-5">
		</div>
	  </div>
	  <div class="col-md-6">
		<h2 class="text-black">{{$pro->name}}</h2>
        <?php
            $cat=DB::table('category')->select('name')->where('id',$pro->cat_id)->first();
        ?>
		<p>{{$cat->name}}</p>


		<p>  <strong class="text-primary h4">{{ number_format($pro->price)}} VNĐ</strong></p>

		<div class="mt-5">
		  <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
			<li class="nav-item">
			  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
				aria-controls="pills-home" aria-selected="true">Thông tin sản phẩm</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
				aria-controls="pills-profile" aria-selected="false">Thông tin chi tiết</a>
			</li>

		  </ul>
		  <div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
			  <table class="table custom-table">
				<thead>
				  <th>Mã sản phẩm</th>
				  <th>Thành phần</th>
				  <th>Hàm lượng</th>
				  <th>Xuất xứ</th>
				</thead>
				<tbody>
                    <?php
        				$nation=DB::table('nation')->select('name')->where('id',$pro->nation_id)->first();
        			?>
				  <tr>
					<th scope="row">{{$pro->id}}</th>
					<th scope="row">{{$pro->ingredient}}</th>
					<td>{{$pro->content}}</td>
					<td>{{$nation->name}}</td>
				  </tr>


				</tbody>
			  </table>
			</div>
			<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
			  <table class="table custom-table">
				<tbody>
				  <tr>
					<td>Công dụng</td>
					<td class="bg-light">{{$pro->uses}}</td>
				  </tr>
				  <tr>
					<td>Cách sử dụng</td>
					<td class="bg-light">{{$pro->using}}</td>
				  </tr>
				  <tr>
					<td>Chú ý</td>
					<td class="bg-light">{{$pro->attention}}</td>
				  </tr>
				</tbody>
			  </table>

			</div>

		  </div>
		</div>
	  </div>
      <div class="col-md-12">
          <p>Hình ảnh đặc trưng</p>
      </div>
      <div class="col-md-12">
          <div class="border text-center">
  		  <img src="{{ url('/')}}/public/img/{{ $pro->images2 }}" alt="Image" class="img-fluid p-5">
          <p>Hình ảnh chi tiết sản phẩm</p>
  		</div>
      </div>

	</div>
  </div>
</div>
@stop
