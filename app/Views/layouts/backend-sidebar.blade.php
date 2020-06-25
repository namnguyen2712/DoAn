<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <?php
      $roleUser = DB::table('user')
      ->join('user_roles','user.id','=','user_roles.user_id')
      ->join('roles','user_roles.role_id','=','roles.id')
      ->where('user.id','=',Auth()->guard('admin')->user()->id)
      ->select('*')
      ->first();
      ?>
        <div class="user-panel">
            <div class="pull-left image">
                <img src="" class="img-circle" alt="">
            </div>
            <div class="pull-left info">
                <p>{{ $roleUser->name}}</p>
            </div>
        </div>




        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">THANH CÔNG CỤ</li>

            <!-- /.thống kê -->
            @if($roleUser->id==1)
            <li>
                <a href="{{route('backend.home')}}">
                    <i class="fa fa-home"></i> <span>Trang chủ</span>
                </a>
            </li>
            @endif

            <!-- NSX -->

            <!-- NCC -->

            @if(($roleUser->id==1 || $roleUser->id==4))
                    <li>
                        <a href="{{route('backend.supply')}}">
                            <i class="glyphicon glyphicon-save"></i> <span>Quản lý nhà cung cấp</span>
                        </a>
                    </li>

            @endif

            <!-- /.Categorys -->

            @if(($roleUser->id==1 || $roleUser->id==4))
            <li>
                <a href="{{ route('backend.category') }}">
                    <i class="glyphicon glyphicon-th-list"></i> <span>Quản lý danh mục</span>
                </a>
            </li>
            @endif

            <!-- / .Unit-->


            <!-- /.Products -->


            @if(($roleUser->id==1 || $roleUser->id==4 || $roleUser->id==3))

          <li class="treeview">
          <a href="#">
            <i class="fa fa-medkit"></i>
            <span>Quản lý sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('backend.products') }}"><i class="fa fa-medkit"></i> Sản phẩm</a></li>
            <li ><a href="{{route('backend.unit')}}"><i class="fa fa-balance-scale"></i> Đơn vị tính</a></li>
            <li ><a href="{{route('backend.nation')}}"><i class="fa fa-flag"></i> Xuất xứ</a></li>
          </ul>
        </li>
        @endif

            <!-- Nhap hang -->

            @if(($roleUser->id==1 || $roleUser->id==4))

            <li>
                <a href="{{route('backend.import')}}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Quản lý nhập hàng</span>
                </a>
            </li>
            @endif

            <!-- /.Orders -->

            @if(($roleUser->id==1 || $roleUser->id==3))

            <li>
                <a href="{{route('backend.order')}}">
                    <i class="glyphicon glyphicon-shopping-cart"></i> <span>Quản lý bán hàng</span>
                </a>
            </li>
            @endif
            @if(($roleUser->id==1 || $roleUser->id==3))

            <li>
                <a href="{{route('backend.order-report')}}">
                    <i class="fa fa-flag-o"></i> <span>Báo cáo doanh thu</span>
                </a>
            </li>
            @endif

            <!-- / .User backend-->



            @if(($roleUser->id==1 || $roleUser->id==3))
            <li class="treeview">
            <a href="#">
              <i class="fa fa-user"></i>
              <span>Quản lý tài khoản</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                @if(($roleUser->id==1))
              <li><a href="{{route('backend.user')}}"><i class="fa fa-user-md"></i> Nhân viên</a></li>
              @endif
              @if(($roleUser->id==1 || $roleUser->id==3))
              <li ><a href="{{route('backend.customer')}}"><i class="fa fa-user-plus"></i> Khách hàng</a></li>
              @endif

            </ul>
          </li>
          @endif

          <li class="treeview <?php if($roleUser->id!=1) echo "hidden"; ?>">
          <a href="#">
            <i class="fa fa-code-fork"></i>
            <span>Phân quyền</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('backend.role')}}"><i class="fa fa-object-group"></i> Nhóm quyền</a></li>
            <li><a href="{{route('backend.permission')}}"><i class="fa fa-cogs"></i> Chức năng hệ thống</a></li>
            <li><a href="{{route('backend.add-role')}}"><i class="fa fa-check-square-o"></i> Phân quyền</a></li>

          </ul>
          </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
