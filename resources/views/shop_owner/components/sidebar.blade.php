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
              <li><a>New orders</a></li>
              <li><a>processing orders</a></li>
              <li><a>Completed orders</a></li>
              <li><a>All orders</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-table"></i> Products <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a>All Products</a></li>
              <li><a href="{{route('shop_owner.add_product')}}">Add Products</a></li>
            </ul>
          </li>
        </ul>
      </div>

    </div>
    <!-- /sidebar menu -->


  </div>
</div>