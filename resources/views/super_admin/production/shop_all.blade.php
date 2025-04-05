<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

  <title>Gentelella Alela!</title>

  <!-- Bootstrap -->
  <link href="{{asset('super_admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{asset('super_admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{asset('super_admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
  <!-- iCheck -->
  <link href="{{asset('super_admin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link href="{{asset('super_admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
  <!-- JQVMap -->
  <link href="{{asset('super_admin/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="{{asset('super_admin/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="{{asset('super_admin/build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">

      <!-- sidebar -->
      @include('super_admin.production.components.sidebar')
      <!-- /sidebar -->

      <!-- top navigation -->
      @include('super_admin.production.components.header')
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row">
          <!-- ============================================================== -->

          <!-- ============================================================== -->

          <!-- recent orders  -->
          <!-- ============================================================== -->
          <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
            <!-- ============================================================== -->
            <!-- top perfomimg  -->
            <!-- ============================================================== -->
            <div class="card">
              <h5 class="card-header">Add Shop</h5>
              <div class="card-body p-0">
                <form action="" method="POST" enctype="multipart/form-data" class="p-2">
                  @csrf
                  @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif
                  @if (session('success'))
                  <div class="alert alert-success">
                    {{ session('success') }}
                  </div>
                  @endif
                  <div class="form-group">
                    <label for="sp_uname" class="col-form-label">Shop Name</label>
                    <input name="name" id="name" type="text" class="form-control" placeholder="Shop Name" value="{{old('name')}}">
                  </div>
                  <div class="form-group">
                    <label for="sp_uname" class="col-form-label">Shop Name Sinhala</label>
                    <input name="name_sinhala" id="name" type="text" class="form-control" placeholder="Shop Name" value="{{old('name_sinhala')}}">
                  </div>
                  <div class="form-group">
                    <label for="sp_branch_code" class="col-form-label">Branch Code Number</label>
                    <input name="branch_code" id="sp_branch_code" type="text" class="form-control" placeholder="Branch Code Number" value="{{old('branch_code')}}">
                  </div>
                  <div class="form-group">
                    <label for="sp_email">Email</label>
                    <input name="email" id="sp_email" type="text" placeholder="Email" class="form-control" value="{{old('email')}}">
                  </div>
                  <div class="form-group">
                    <label for="sp_contact">Contact No</label>
                    <input name="contact" id="sp_contact" type="text" placeholder="Contact No" class="form-control" value="{{old('contact')}}">
                  </div>
                  <div class="form-group">
                    <label for="sp_price_range">Select Price Range</label>
                    <select class="form-control" id="sp_price_range" name="price_range">
                      <option value="">Select Price Range</option>
                      <option value="Unit Price">Unit Price</option>
                      <option value="PB MRP">PB MRP</option>
                      <option value="PB Direct Sale Price">PB Direct Sale Price</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="sp_route">Select Morning Route</label>
                    <select class="form-control" id="sp_route" name="morning_route">
                      <option value="">Select Morning Route</option>
                      <option value="none">None</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="sp_route">Select Evening Route</label>
                    <select class="form-control" id="sp_route" name="evening_route">
                      <option value="">Select Evening Route</option>
                      <option value="none">None</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="sp_shop_type">Select Shop Type</label>
                    <select class="form-control" id="sp_shop_type" name="type">
                      <option value="">Select Shop Type</option>
                      <option value="Outlet">Outlet</option>
                      <option value="Route Rep">Route Rep</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="sp_route">Order Time</label>
                    <select class="form-control" id="sp_order_time" name="order_time">
                      <option value="">Select Order Time</option>
                      <option value="Morning">Morning</option>
                      <option value="Evening">Evening</option>
                      <option value="Both">Both</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" id="password" type="text" placeholder="Password" class="form-control" value="{{old('password')}}">
                  </div>
                  <div>
                    <button type="submit" class="btn btn-primary">Add</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- ============================================================== -->
            <!-- end top perfomimg  -->
            <!-- ============================================================== -->
          </div>
          <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
            <div class="card">
              @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
              @endif
              <h5 class="card-header">All Shops</h5>
              <form action="/order-admin/add-shop" method="GET">
                @csrf
                <div class="input-group flex-nowrap p-2">
                  <input type="text" class="form-control" id="ordering_admin_all_items_srch"
                    placeholder="Search Shops" aria-describedby="addon-wrapping" name="search">
                  <button type="submit" class="input-group-text btn" id="addon-wrapping">Search</button>
                </div>
              </form>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="bg-light">
                      <tr class="border-0">
                        <th class="border-0">#</th>
                        <th class="border-0">Branch Code</th>
                        <th class="border-0">Name</th>
                        <th class="border-0">Email</th>
                        <th class="border-0">Price Range</th>
                        <th class="border-0">Morning Route</th>
                        <th class="border-0">Evening Route</th>
                        <th class="border-0">Order Time</th>
                        <th class="border-0">Type</th>
                        <th class="border-0">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- end recent orders  -->

        </div>
      </div>
      <!-- /page content -->

    </div>
  </div>

  <!-- jQuery -->
  <script src="{{asset('super_admin/vendors/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{asset('super_admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('super_admin/vendors/fastclick/lib/fastclick.js')}}"></script>
  <!-- NProgress -->
  <script src="{{asset('super_admin/vendors/nprogress/nprogress.js')}}"></script>
  <!-- Chart.js -->
  <script src="{{asset('super_admin/vendors/Chart.js/dist/Chart.min.js')}}"></script>
  <!-- gauge.js -->
  <script src="{{asset('super_admin/vendors/gauge.js/dist/gauge.min.js')}}"></script>
  <!-- bootstrap-progressbar -->
  <script src="{{asset('super_admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
  <!-- iCheck -->
  <script src="{{asset('super_admin/vendors/iCheck/icheck.min.js')}}"></script>
  <!-- Skycons -->
  <script src="{{asset('super_admin/vendors/skycons/skycons.js')}}"></script>
  <!-- Flot -->
  <script src="{{asset('super_admin/vendors/Flot/jquery.flot.js')}}"></script>
  <script src="{{asset('super_admin/vendors/Flot/jquery.flot.pie.js')}}"></script>
  <script src="{{asset('super_admin/vendors/Flot/jquery.flot.time.js')}}"></script>
  <script src="{{asset('super_admin/vendors/Flot/jquery.flot.stack.js')}}"></script>
  <script src="{{asset('super_admin/vendors/Flot/jquery.flot.resize.js')}}"></script>
  <!-- Flot plugins -->
  <script src="{{asset('super_admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
  <script src="{{asset('super_admin/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
  <script src="{{asset('super_admin/vendors/flot.curvedlines/curvedLines.js')}}"></script>
  <!-- DateJS -->
  <script src="{{asset('super_admin/vendors/DateJS/build/date.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{asset('super_admin/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
  <script src="{{asset('super_admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
  <script src="{{asset('super_admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="{{asset('super_admin/vendors/moment/min/moment.min.js')}}"></script>
  <script src="{{asset('super_admin/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

  <!-- Custom Theme Scripts -->
  <script src="{{asset('super_admin/build/js/custom.min.js')}}"></script>

</body>

</html>