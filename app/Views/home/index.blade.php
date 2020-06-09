@extends('layouts.backend')
@section('title','TRANG CHỦ')
@section('box-body')

		<div class="container-fluid main">
		<?php
          $oder = DB::table('order')->count('*');
          $mem = DB::table('user')->count('*');
          $pro = DB::table('products')->count('*');

          $import = DB::table('import')->count('*');
          $customer = DB::table('customer')->count('*');
          $cat = DB::table('category')->count('*');
          $supply = DB::table('supply')->count('*');
		  $staff=DB::table('user_roles')->where('role_id','3')->count('*');
          $nhap = [];
          $xuat = [];
          $years = date('Y');
          for($i = 1; $i < 13;$i++){
          	$day_start = $years.'-'.$i.'-1';
          	$day_end = $years.'-'.$i.'-31';
          	// echo "<pre>";
          	// var_dump($day_end);
          	// var_dump($day_start);
          	// echo "</pre>";
          	$o = DB::table('order')->whereBetween('created_at',[$day_start,$day_end])->get();
          	$sum_o = 0;
          	foreach ($o as $o) {
          		$sum_o = $sum_o + $o->sum;
          	}
          	// echo "<pre>";
          	// var_dump($sum_o);
          	// echo "</pre>";
          	$nhap[$i] = $sum_o;
          	$sum_i = 0;
          	$imp = DB::table('import')->whereBetween('created_at',[$day_start,$day_end])->get();
          	foreach ($imp as $imp) {
          		$sum_i = $sum_i + $imp->sum;
          	}
          	$xuat[$i]=$sum_i;
          	// echo "<pre>";
          	// var_dump($sum_i);
          	// echo "</pre>";
          	//
          }
          $sumt = DB::table('import_detail')->join('products','import_detail.pro_id','=','products.id')->sum('import_detail.quantity');

          $bant = DB::table('order_detail')->join('products','order_detail.pro_id','=','products.id')->sum('order_detail.quantity');
       		// echo "<pre>";
         //  	var_dump($dienthoai);
         //  	echo "</pre>";
      		$sumtk = $sumt-$bant;


        ?>

		@for($i = 1; $i< 13;$i++)
        <p class="hidden" id="nhap-{{$i}}">{{$nhap[$i]}}</p>
        <p class="hidden" id="xuat-{{$i}}">{{$xuat[$i]}}</p>
		@endfor
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thống kê</h1>
			</div>
		</div><!--/.row-->


		<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$oder}}</h3>

              <p>Hóa đơn bán</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('backend.order')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$import}}</h3>

              <p>Phiếu nhập hàng</p>
            </div>
            <div class="icon">
              <i class="ion ion-printer"></i>
            </div>
            <a href="{{route('backend.import')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$customer}}</h3>

              <p>Khách hàng</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('backend.customer')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$staff}}</h3>

              <p>Nhân viên bán hàng</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>

            </div>
            <a href="{{route('backend.user')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
		<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$supply}}</h3>

              <p>Nhà cung cấp</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-cart"></i>
            </div>
            <a href="{{route('backend.supply')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$mem}}</h3>

              <p>Tài khoản</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-settings"></i>
            </div>
            <a href="{{route('backend.user')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$cat}}</h3>

              <p>Danh mục sản phẩm</p>
            </div>
            <div class="icon">
              <i class="ion ion-navicon"></i>
            </div>
            <a href="{{route('backend.category')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$pro}}</h3>
              <p>Sản phẩm</p>
            </div>
            <div class="icon">
              <i class="ion ion-medkit"></i>

            </div>
            <a href="{{route('backend.products')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
		<!-- row -->
		<div class="row">
			<div class="col-lg-9">
				<div class="panel panel-default">
					<div class="panel-heading">Biểu đồ nhập/xuất năm 2020</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="100" width="600"></canvas>
						</div>

					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="panel panel-default">
					<div class="panel-heading">Chú thích</div>
					<div class="panel-body">
						<div class="">
							<div class="col-lg-12">
								<div class="col-md-3" style="font-size: 20px; margin-top: 5px;">Xuất</div>
								<div class="col-md-9"><span class="glyphicon glyphicon-minus" style="color: rgba(220,0,0,1); font-size: 34px;"></span></div>
							</div>
							<div class="col-lg-12">
								<div class="col-md-3" style="font-size: 20px;margin-top: 5px;"> Nhập </div>
								<div class="col-md-9"><span class="glyphicon glyphicon-minus" style="color: rgba(48, 164, 255, 1); font-size: 34px;"></span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->


		<div class="row">
			<div class="col-md-6 col-sm-12 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Số lượng thuốc bán ra</span>
              <span class="info-box-number">{{$bant}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

		<div class="col-md-6 col-sm-12 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-printer"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Số lượng hàng còn trong kho</span>
              <span class="info-box-number">{{$sumtk}}</span>
			  <a href="{{route('backend.products-report')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
		</div><!--/.row-->

	</div>
		<!-- jQuery -->
		<script src="http://code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>
@stop()
