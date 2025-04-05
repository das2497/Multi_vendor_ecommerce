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
              <h5 class="card-header">Add Product Category</h5>
              <div class="card-body p-0">
                <form action="{{route('super-admin.product-category-save')}}" method="POST" enctype="multipart/form-data" class="p-2">
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
                    <label for="file" class="col-form-label">Category image</label>
                    <input name="file" id="file" type="file" class="form-control" value="{{old('file')}}">
                  </div>
                  <div class="form-group">
                    <label for="name" class="col-form-label">Product Category Name</label>
                    <input name="name" id="name" type="text" class="form-control" placeholder="Shop Category Name" value="{{old('name')}}">
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
              <h5 class="card-header">All Product Categories</h5>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="bg-light">
                      <tr class="border-0">
                        <th class="border-0">#</th>
                        <th class="border-0">Image</th>
                        <th class="border-0">Name</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $category)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><img src="{{asset('assets/images/product_category/'.$category->img)}}" height="40" alt=""></td>
                        <td>{{$category->name}}</td>
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