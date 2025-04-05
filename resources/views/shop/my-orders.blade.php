<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>My orders</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('shop/images/logo.jpg') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('shop/images/logo.jpg') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('shop/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('shop/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('shop/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('shop/css/custom.css') }}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start Main Top -->
    @include('shop.components.header')
    <!-- End Main Top -->

    <!-- Start All Title Box -->
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <h2>My Orders</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">My Orders</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Gallery  -->
    <div class="container my-2">
        <div class="row">
            <div class="col-12 col-lg-2">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active">New Orders</button>
                    <button type="button" class="list-group-item list-group-item-action">Cancelled Orders</button>
                </div>
            </div>
            <div class="col-12 col-lg-10">
                @foreach ($orders as $order)
                <div class="card my-1">
                    <div class="card-header">
                        <span class="text-muted"> &nbsp;{{$order->order_id}}</span>
                        <span class="text-muted"> &nbsp; Total : Rs.{{$order->total_price}}</span>
                        <span class="text-muted badge"> &nbsp; Status : {{$order->status}}</span>
                        <span class="float-end">Order Date : {{$order->order_date}} </span>
                    </div>
                    <button class="btn btn-warning">View</button>
                    @php
                    $cart_items = DB::table('carts')->where('order_id', $order->order_id)
                    ->join('products', 'carts.product_id', '=', 'products.unique_id')
                    ->join('shops', 'shops.name', '=', 'products.shop')
                    ->select('carts.*', 'products.*', 'shops.*','carts.qty as quantity','products.name as product_name','products.price as product_price')
                    ->get();
                    @endphp
                    @foreach ($cart_items as $cart_item)
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('/assets/images/products/'. $cart_item->img1) }}" width="80" alt="product" class="img-thumbnail">
                            </div>
                            <div class="col-4 d-flex align-items-center">
                                <img src="{{ asset('/assets/images/shop/'. $cart_item->img) }}" width="40" alt="product" class="img-thumbnail">
                                <span class="fw-bold"> {{$cart_item->shop}} </span>
                            </div>
                            <div class="col-2">
                                <p class="card-title">{{$cart_item->product_name}}</p>
                            </div>
                            <div class="col-2">
                                <p class="card-title">Qty : {{$cart_item->quantity}}</p>
                            </div>
                            <div class="col-2">
                                <p class="card-title">Price : Rs.{{$cart_item->product_price}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Gallery  -->

    <!-- Start Footer  -->
    @include('shop.components.footer')
    <!-- End Footer  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{ asset('shop/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('shop/js/popper.min.js') }}"></script>
    <script src="{{ asset('shop/js/bootstrap.min.js') }}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('shop/js/jquery.superslides.min.js') }}"></script>
    <script src="{{ asset('shop/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('shop/js/inewsticker.js') }}"></script>
    <script src="{{ asset('shop/js/bootsnav.js') }}"></script>
    <script src="{{ asset('shop/js/images-loded.min.js') }}"></script>
    <script src="{{ asset('shop/js/isotope.min.js') }}"></script>
    <script src="{{ asset('shop/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('shop/js/baguetteBox.min.js') }}"></script>
    <script src="{{ asset('shop/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('shop/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('shop/js/custom.js') }}"></script>

    @if(session('cart_add_success'))
    <script>
        const successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
    </script>
    @endif
</body>

</html>