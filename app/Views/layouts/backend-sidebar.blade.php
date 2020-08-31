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
        $checkPermissionViewHome =  DB::table('permissions')->where('name','home')->value('id');
        $checkPermissionViewProduct =  DB::table('permissions')->where('name','product-view')->value('id');
        $checkPermissionViewOrder =  DB::table('permissions')->where('name','order-view')->value('id');
        $checkPermissionViewImport =  DB::table('permissions')->where('name','import-view')->value('id');
        $checkPermissionViewSupply =  DB::table('permissions')->where('name','supply-view')->value('id');
        $checkPermissionViewUnit =  DB::table('permissions')->where('name','unit-view')->value('id');
        $checkPermissionViewNation =  DB::table('permissions')->where('name','nation-view')->value('id');
        $checkPermissionViewRole =  DB::table('permissions')->where('name','role-view')->value('id');
        $checkPermissionViewCategory =  DB::table('permissions')->where('name','category-view')->value('id');
        $checkPermissionViewUser =  DB::table('permissions')->where('name','user-view')->value('id');
        $checkPermissionViewCustomer =  DB::table('permissions')->where('name','customer-view')->value('id');
        $checkPermissionViewRolePer =  DB::table('permissions')->where('name','customer-view')->value('id');

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
            @if($listRoleOfUser->contains($checkPermissionViewHome))
            <li>
                <a href="{{route('backend.home')}}">
                    <i class="fa fa-home"></i> <span>Trang chủ</span>
                </a>
            </li>
            @endif

            <!-- NSX -->

            <!-- NCC -->

            @if($listRoleOfUser->contains($checkPermissionViewSupply))
                    <li>
                        <a href="{{route('backend.supply')}}">
                            <i class="glyphicon glyphicon-save"></i> <span>Quản lý nhà cung cấp</span>
                        </a>
                    </li>

            @endif

            <!-- /.Categorys -->

            @if($listRoleOfUser->contains($checkPermissionViewCategory))
            <li>
                <a href="{{ route('backend.category') }}">
                    <i class="glyphicon glyphicon-th-list"></i> <span>Quản lý danh mục</span>
                </a>
            </li>
            @endif

            <!-- / .Unit-->


            <!-- /.Products -->




          <li class="treeview">
          <a href="#">
            <i class="fa fa-medkit"></i>
            <span>Quản lý sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              @if($listRoleOfUser->contains($checkPermissionViewProduct))
              <li><a href="{{ route('backend.products') }}"><i class="fa fa-medkit"></i> Sản phẩm</a></li>
              @endif
              @if($listRoleOfUser->contains($checkPermissionViewUnit))
              <li ><a href="{{route('backend.unit')}}"><i class="fa fa-balance-scale"></i> Đơn vị tính</a></li>
              @endif
              @if($listRoleOfUser->contains($checkPermissionViewNation))
              <li ><a href="{{route('backend.nation')}}"><i class="fa fa-flag"></i> Xuất xứ</a></li>
              @endif

          </ul>
        </li>


            <!-- Nhap hang -->

            @if($listRoleOfUser->contains($checkPermissionViewImport))

            <li>
                <a href="{{route('backend.import')}}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Quản lý nhập hàng</span>
                </a>
            </li>
            @endif

            <!-- /.Orders -->

            @if($listRoleOfUser->contains($checkPermissionViewOrder))

            <li>
                <a href="{{route('backend.order')}}">
                    <i class="glyphicon glyphicon-shopping-cart"></i> <span>Quản lý bán hàng</span>
                </a>
            </li>
            @endif


            <li class="treeview">
            <a href="#">
              <i class="fa fa-flag"></i>
              <span>Báo cáo</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{route('backend.order-report')}}">
                        <i class="fa fa-flag-o"></i> <span>Báo cáo doanh thu</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('backend.products-report')}}">
                        <i class="fa fa-flag-checkered"></i> <span>Báo cáo hàng tồn kho</span>
                    </a>
                </li>

            </ul>
            </li>


            <!-- / .User backend-->




            <li class="treeview">
            <a href="#">
              <i class="fa fa-user"></i>
              <span>Quản lý tài khoản</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            @if($listRoleOfUser->contains($checkPermissionViewUser))
              <li><a href="{{route('backend.user')}}"><i class="fa fa-user-md"></i> Nhân viên</a></li>
             @endif
            @if($listRoleOfUser->contains($checkPermissionViewCustomer))
              <li ><a href="{{route('backend.customer')}}"><i class="fa fa-user-plus"></i> Khách hàng</a></li>
            @endif

            </ul>
          </li>


          @if($listRoleOfUser->contains($checkPermissionViewRole))

          <li class="treeview">
          <a href="#">
            <i class="fa fa-code-fork"></i>
            <span>Phân quyền</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if($listRoleOfUser->contains($checkPermissionViewRole))
                <li><a href="{{route('backend.role')}}"><i class="fa fa-object-group"></i> Nhóm quyền</a></li>
            @endif
                <li><a href="{{route('backend.permission')}}"><i class="fa fa-cogs"></i> Chức năng hệ thống</a></li>
            @if($listRoleOfUser->contains($checkPermissionViewRolePer))
                <li><a href="{{route('backend.add-role')}}"><i class="fa fa-check-square-o"></i> Phân quyền</a></li>

            @endif

          </ul>
          </li>
          @endif

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
