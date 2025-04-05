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
            @include('rider.components.sidebar')
            <!-- /sidebar -->

            <!-- top navigation -->
            @include('rider.components.header')
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <!-- top tiles -->

                <div class="container mt-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Packaging orders</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('rider.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="#">Packaging orders</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <h5 class="card-header">Packaging Orders</h5>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">ID</th>
                                                <th class="border-0">Customer Name</th>
                                                <th class="border-0">Customer Contact 1</th>
                                                <th class="border-0">Customer Contact 2</th>
                                                <th class="border-0">Customer Address</th>
                                                <th class="border-0">Zone</th>
                                                <th class="border-0">Price</th>
                                                <th class="border-0">Order Date</th>
                                                <th class="border-0">Status</th>
                                                <th class="border-0">Update</th>
                                                <th class="border-0">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td>{{$order->order_id}}</td>
                                                <td>{{$order->customer_name}}</td>
                                                <td>{{$order->contact_1}}</td>
                                                <td>{{$order->contact_2}}</td>
                                                <td>{{$order->address_1}}</td>
                                                <td>{{$order->zone}}</td>
                                                <td>Rs.{{number_format($order->total_price,2)}}</td>
                                                <td>{{$order->order_created}}</td>
                                                <form action="{{route('rider.packaging-orders-change-state')}}" method="POST">
                                                    @csrf
                                                    <td>
                                                        <select name="state" id="rider_id" class="form-control-sm">
                                                            <option value="">Select Status</option>
                                                            <option value="Packaging">Packaging</option>
                                                            <option value="Shipping">Shiping</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="order_id" value="{{$order->order_id}}">
                                                        <button type="submit" class="btn btn-danger">Update</b>
                                                </form>
                                                </td>
                                                <td>
                                                    <a href="/rider/packaging-orders-view/{{$order->order_id}}" class="btn btn-primary">View</a>
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