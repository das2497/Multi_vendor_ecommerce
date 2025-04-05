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

                <div class="container mt-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Packaging orders view</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/super-admin/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="/super-admin/new-orders">Packaging orders</a></li>
                                <li class="breadcrumb-item active">Packaging orders view</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12">
                        <div class="card my-1">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-4">
                                        <p class="text-muted"> Order id : {{$order->order_id}}</p>
                                        <p class="text-muted"> Total : Rs.{{$order->total_price}}</p>
                                        <p class="text-muted"> Status : <span class="bg-warning p-1 rounded">{{$order->status}}</span></p>
                                        <p class="float-end"> Rider name : {{ $order->rider_name ?? 'Not assigned' }} </p>
                                        <p class="float-end"> Order Date : {{$order->order_created}} </p>
                                    </div>
                                    <div class="col-8">
                                        <p class="card-title">Customer nsme : {{$order->customer_name}}</p>
                                        <p class="card-title">Customer contact 1 : {{$order->contact_1}}</p>
                                        <p class="card-title">Customer contact 2 : {{$order->contact_2}}</p>
                                        <p class="card-title">Customer address : {{$order->address_1}}</p>
                                        <p class="card-title">Customer zone : {{$order->zone}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach ($order_items as $item)                                
                                <div class="row">
                                    <div class="col-2">
                                        <img src="{{ asset('/assets/images/products/' . $item->img1) }}" width="80" alt="product" class="img-thumbnail">
                                        <p class="card-title">{{$item->product_name}}</p>
                                        <p class="card-title">{{$item->product_id}}</p>
                                    </div>
                                    <div class="col-2">
                                        <img src="{{ asset('/assets/images/shop/' . $item->img) }}" width="80" alt="product" class="img-thumbnail">
                                    </div>
                                    <div class="col-4">
                                        <p class="fw-bold"> Shop name : {{$item->product_id}}</p>
                                        <p class="fw-bold"> Shop id : {{$item->product_id}}</p>
                                        <p class="fw-bold"> Shop contact : {{$item->product_id}}</p>
                                        <p class="fw-bold"> Shop address : {{$item->product_id}}</p>
                                        <p class="fw-bold"> Shop zone : {{$item->product_id}}</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="card-title">Qty : {{$item->cart_qty}}</p>
                                        <br>
                                        <p class="card-title">Price : Rs. {{$item->product_price}}</p>
                                    </div>
                                    <div class="col-2">
                                        <p class="card-title">Status : {{$item->status}}</p>
                                    </div>
                                </div>
                                <hr class="my-1">
                                @endforeach
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