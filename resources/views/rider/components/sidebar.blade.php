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
          <li>
            <a href="{{route('super-admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard </a>
          </li>
          <li>
            <a href="{{route('rider.packaging-orders')}}"><i class="fa fa-edit"></i> Packaging Orders </a>
          </li>
          <li>
            <a href="{{route('rider.shipping-orders')}}"><i class="fa fa-desktop"></i> Shiping Orders </a>
          </li>
          <li>
            <a href="{{route('rider.delivered-orders')}}"><i class="fa fa-desktop"></i> Delivered Orders </a>
          </li>
          <li>
            <a href="{{route('rider.canceled-orders')}}"><i class="fa fa-desktop"></i> Canceled Orders </a>
          </li>
        </ul>
      </div>

    </div>
    <!-- /sidebar menu -->


  </div>
</div>