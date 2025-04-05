<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a class="site_title"><img src="{{ asset('shop/images/logo.jpg') }}" width="40" alt=""> <span>{{ Auth::user()->name }}</span></a>
    </div>

    <div class="clearfix"></div>

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a href="{{route('super-admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard </a>
          </li>
          <li><a><i class="fa fa-edit"></i> Orders <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('super-admin.packaging-orders')}}">Packaging orders</a></li>
              <li><a href="/super-admin/shipping-orders">Shiping orders</a></li>
              <li><a href="/super-admin/delivered-orders">Delivered orders</a></li>
              <li><a href="/super-admin/cancelled-orders">Cancelled orders</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-desktop"></i> Shops <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a>Active Shops</a></li>
              <li><a>Pending Shops</a></li>
              <li><a>Banned Shops</a></li>
              <li><a href="{{route('super-admin.shop-category')}}">Shop Categories</a></li>
              <li><a href="{{route('super-admin.add-shop')}}">Add Shops</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-table"></i> Products <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a>All Products</a></li>
              <li><a>Shop Wise Products</a></li>
              <li><a href="{{route('super-admin.product-category')}}">Products Categories</a></li>
              <li><a href="{{route('super-admin.product-sub-category')}}">Products Sub Categories</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-bar-chart-o"></i> Riders <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a>Active Riders</a></li>
              <li><a>All Riders</a></li>
              <li><a href="{{route('super-admin.rider-add')}}">Add Riders</a></li>
            </ul>
          </li>
          <li><a href="{{route('super-admin.zones')}}"><i class="fa fa-clone"></i> Zones </a>
          </li>
          <li><a><i class="fa fa-clone"></i> Logs <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a>All Logs</a></li>
              <li><a>Rider Log</a></li>
              <li><a>Customer Log</a></li>
              <li><a>Shop Log</a></li>
              <li><a>Order Log</a></li>
            </ul>
          </li>
        </ul>
      </div>

    </div>
    <!-- /sidebar menu -->


  </div>
</div>