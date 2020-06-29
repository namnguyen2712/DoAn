<header class="main-header">
    <!-- Logo -->

    <a href="{{route('backend.home')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Quản trị</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <ul class="nav navbar-nav">
          <li><a href="" style="font-size: 1.5em;">Hệ thống: <?php echo date("d-m-Y H:i"); ?></a></li></h4 >
      </ul>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown">
              @if(Auth::guard('admin')->check())
              <a href="#" class="dropdown-toggle user-login" data-toggle="dropdown">Xin chào   {{ Auth::guard('admin')->user()->full_name }} <b class="caret"></b></a>
              <ul class="dropdown-menu">

                <li><a href="{{route('backend.logout')}}"><span class="glyphicon glyphicon-off"></span> Đăng xuất</a></li>
                <li><a href="{{route('backend.user-change-password',['id'=> Auth::guard('admin')->user()->id])}}"><span class="fa fa-pencil"></span>Đổi mật khẩu </a></li>
              </ul>
            </li>
            @else
            <li><a href="{{route('backend.login')}}" title="">Đăng nhập</a></li>
            @endif
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
