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
                <form action="{{route('super-admin.add-shop-save')}}" method="POST" enctype="multipart/form-data" class="p-2">
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
                  @if (session('error'))
                  <div class="alert alert-danger">
                    {{ session('error') }}
                  </div>
                  @endif
                  <div class="form-group">
                    <label for="file" class="col-form-label">Shop image</label>
                    <input name="file" id="file" type="file" class="form-control" value="{{old('file')}}">
                  </div>
                  <div class="form-group">
                    <label for="sp_uname" class="col-form-label">Shop Name</label>
                    <input name="name" id="name" type="text" class="form-control" placeholder="Shop Name" value="{{old('name')}}">
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
                    <label for="sp_address">Address</label>
                    <input name="address" id="sp_address" type="text" placeholder="Address" class="form-control" value="{{old('contact')}}">
                  </div>
                  <div class="form-group">
                    <label for="category">Select Category</label>
                    <select class="form-control" id="category" name="category">
                      <option value="">Select Category</option>
                      @foreach ($shop_categories as $shop_category)
                      <option value="{{$shop_category->name}}">{{$shop_category->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="zone">Select Zone</label>
                    <select class="form-control" id="zone" name="zone">
                      <option value="">Select Zone</option>
                      @foreach ($zones as $zone)
                      <option value="{{$zone->zone_name}}">{{$zone->zone_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" id="password" type="text" placeholder="Password" class="form-control" value="{{old('password')}}">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary w-100">Add</button>
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
                        <th class="border-0">Unique ID</th>
                        <th class="border-0">Image</th>
                        <th class="border-0">Name</th>
                        <th class="border-0">Email</th>
                        <th class="border-0">Category</th>
                        <th class="border-0">Contact</th>
                        <th class="border-0">Address</th>
                        <th class="border-0">Zone</th>
                        <th class="border-0">Status</th>
                        <th class="border-0">Registerd at</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($shops as $shop)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $shop->unique_id }}</td>
                        <td><img src="{{ asset('assets/images/shop/'.$shop->img) }}" alt="image" style="width: 50px; height: 50px; border-radius: 50%;"></td>
                        <td>{{ $shop->name }}</td>
                        <td>{{ $shop->email }}</td>
                        <td>{{ $shop->category }}</td>
                        <td>{{ $shop->contact }}</td>
                        <td>{{ $shop->address }}</td>
                        <td>{{ $shop->zone }}</td>
                        <td>{{ $shop->status }}</td>
                        <td>{{ $shop->created_at }}</td>
                        @endforeach
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