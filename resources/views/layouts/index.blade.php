<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pharma</title>
     <meta charset="utf-8">
	 <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="{{ url('/') }}/public/fonts/icomoon/style.css">

     <link rel="stylesheet" href="{{ url('/') }}/public/css/bootstrap.min.css">
     <link rel="stylesheet" href="{{ url('/') }}/public/css/magnific-popup.css">
     <link rel="stylesheet" href="{{ url('/') }}/public/css/jquery-ui.css">
     <link rel="stylesheet" href="{{ url('/') }}/public/css/owl.carousel.min.css">
     <link rel="stylesheet" href="{{ url('/') }}/public/css/owl.theme.default.min.css">

	 <link rel="stylesheet" href="{{ url('/') }}/public/css/aos.css">

	 <link rel="stylesheet" href="{{ url('/') }}/public/css/style.css">
</head>
<body>

	<div class="site-wrap">


    <div class="site-navbar py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="{{route('search')}}" method="GET">
            <input type="text" class="form-control" name="key"  placeholder="Nhập từ khóa tìm kiếm ...">
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="{{route('index')}}" class="js-logo-clone">Pharma</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li ><a href="{{route('index')}}">Trang chủ</a></li>
                <li><a href="{{route('sanpham')}}">Cửa hàng</a></li>
                <li class="has-children">
                  <a href="#">Danh mục thuốc</a>
                  <ul class="dropdown">
					  <?php $cat=DB::Table('category')->get() ?>
					  @foreach($cat as $cat)
					  <li><a href="{{route('danhmuc',['id'=>$cat->id])}}">{{$cat->name}}</a></li>
					  @endforeach
                  </ul>
                </li>


              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>



	<div>
		@yield('main')
	</div>


    <div class="site-section bg-secondary bg-image" style="background-image: url('{{ url('/') }}/public/img/bg_2.jpg');">
      <div class="container">
        <div class="row align-items-stretch">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="{{route('sanpham')}}" class="banner-1 h-100 d-flex" style="background-image: url('{{ url('/') }}/public/img/bg_1.jpg');">
              <div class="banner-1-inner align-self-center">
                <h2>Sản phẩm y tế</h2>
                <p>Các sản phẩm của chúng tôi nhập khẩu đều có chứng nhận xuất xứ.
                </p>
              </div>
            </a>
          </div>
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('{{ url('/') }}/public/img/bg_2.jpg');">
              <div class="banner-1-inner ml-auto  align-self-center">
                <h2>Đội ngũ dược sĩ</h2>
                <p>Ở Pharma, mỗi dược sỹ không chỉ có năng lực chuyên môn cao, luôn tận tâm với nghề mà còn được đào tạo và huấn luyện để hoàn thành xuất sắc những sứ mệnh được giao.
                </p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>


    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

            <div class="block-7">
              <h3 class="footer-heading mb-4">Về chúng tôi</h3>
              <p>Sức khỏe của bạn là hạnh phúc của chúng tôi</p>
            </div>

          </div>
          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Đường dẫn nhanh</h3>

            <ul class="list-unstyled">
				<?php $cat=DB::Table('category')->limit(4)->get() ?>
				@foreach($cat as $cat)
				<li><a href="{{route('danhmuc',['id'=>$cat->id])}}">{{$cat->name}}</a></li>
				@endforeach
            </ul>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Liên hệ</h3>
              <ul class="list-unstyled">
                <li class="address">236 Hoàng Quốc Việt</li>
                <li class="phone"><a href="">0869957997</a></li>
                <li class="email">nannh27121997@gmail.com</li>
              </ul>
            </div>


          </div>
        </div>

      </div>
    </footer>
  </div>

	<!-- <script src="{{ url('/') }}/public/js/jquery.min.js"></script> -->
	<!-- <script src="{{ url('/') }}/public/js/bootstrap.min.js"></script> -->

	<!-- Thông báo success -->


	<script src="{{ url('/') }}/public/js/jquery-3.3.1.min.js"></script>
    <script src="{{ url('/') }}/public/js/jquery-ui.js"></script>
    <script src="{{ url('/') }}/public/js/popper.min.js"></script>
    <script src="{{ url('/') }}/public/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/public/js/owl.carousel.min.js"></script>
    <script src="{{ url('/') }}/public/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ url('/') }}/public/js/aos.js"></script>

    <script src="{{ url('/') }}/public/js/main.js"></script>

</body>




</html>
