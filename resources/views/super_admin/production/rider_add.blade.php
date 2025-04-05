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
              <h5 class="card-header">Add Rider</h5>
              <div class="card-body p-0">
                <form action="{{route('super-admin.rider-add-save')}}" method="POST" enctype="multipart/form-data" class="p-2">
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
                    <label for="name" class="col-form-label">Rider Name</label>
                    <input name="name" id="name" type="text" class="form-control" placeholder="Rider Name" value="{{old('name')}}">
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-form-label">Rider Email</label>
                    <input name="email" id="email" type="text" class="form-control" placeholder="Rider Email" value="{{old('email')}}">
                  </div>
                  <div class="form-group">
                    <label for="vehicle" class="col-form-label">Rider Vehicle</label>
                    <input name="vehicle" id="vehicle" type="text" class="form-control" placeholder="Rider Vehicle" value="{{old('vehicle')}}">
                  </div>
                  <div class="form-group">
                    <label for="contact_1" class="col-form-label">Rider Contact 1</label>
                    <input name="contact_1" id="contact_1" type="text" class="form-control" placeholder="Rider Contact 1" value="{{old('contact_1')}}">
                  </div>
                  <div class="form-group">
                    <label for="contact_2" class="col-form-label">Rider Contact 2</label>
                    <input name="contact_2" id="contact_2" type="text" class="form-control" placeholder="Rider Contact 2" value="{{old('contact_2')}}">
                  </div>
                  <div class="form-group">
                    <label for="address" class="col-form-label">Rider Address</label>
                    <input name="address" id="address" type="text" class="form-control" placeholder="Rider Address" value="{{old('address')}}">
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-form-label">Password</label>
                    <input name="password" id="password" type="text" class="form-control" placeholder="Password" value="{{old('password')}}">
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
              <h5 class="card-header">All Riders</h5>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="bg-light">
                      <tr class="border-0">
                        <th class="border-0">#</th>
                        <th class="border-0">Name</th>
                        <th class="border-0">Email</th>
                        <th class="border-0">Vehicle</th>
                        <th class="border-0">Contact 1</th>
                        <th class="border-0">Contact 2</th>
                        <th class="border-0">Address</th>
                        <th class="border-0">Currently</th>
                        <th class="border-0">Status</th>                        
                        <th class="border-0">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($riders as $rider)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $rider->name }}</td>
                        <td>{{ $rider->email }}</td>
                        <td>{{ $rider->vehicle }}</td>
                        <td>{{ $rider->contact_1 }}</td>
                        <td>{{ $rider->contact_2 }}</td>
                        <td>{{ $rider->address }}</td>
                        <td>{{ $rider->currently_status }}</td>
                        <td>{{ $rider->state }}</td>
                        <td>
                          <a class="btn btn-sm btn-primary">Edit</a>
                        </td>
                      </tr>
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