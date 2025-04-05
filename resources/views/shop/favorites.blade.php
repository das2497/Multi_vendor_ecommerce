<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Freshshop - Ecommerce Bootstrap 4 HTML Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('shop/images/logo.jpg') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('shop/images/logo.jpg') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('shop/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('shop/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('shop/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('shop/css/custom.css') }}">

    <style>
        .counter {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .button {
            padding: 10px;
            background-color: orangered;
            color: white;
            font-weight: bold;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .button:hover {
            background-color: rgb(0, 0, 0);
        }

        .qty-input {
            width: 50px;
            text-align: center;
            font-size: 16px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <!-- Start Main Top -->
    @include('shop.components.header')
    <!-- End Main Top -->

    <!-- Start All Title Box -->
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <h2>Cart</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Favorites</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                @if(session('cart_update_error'))
                <div class="alert alert-danger">
                    {{ session('cart_update_error') }}
                </div>
                @endif
                @if(session('cart_update_success'))
                <div class="alert alert-success">
                    {{ session('cart_update_success') }}
                </div>
                @endif
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead style="background-color: orangered;">
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
                                            <img class="img-thumbnail" src="{{asset('assets/images/products/'.$item->img1)}}" alt="" />
                                        </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
                                            {{$item->name}}
                                        </a>
                                    </td>
                                    <td class="price-pr">
                                        <p>Rs.{{number_format($item->price,2)}}</p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="" class="btn btn-danger">
                                            <i class="fa fa-shopping-bag"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

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

    <script>
        function increment(id) {
            const input = document.getElementById(id);
            let value = parseInt(input.value, 10);
            if (!isNaN(value)) {
                input.value = value + 1;
            }
        }

        function decrement(id) {
            const input = document.getElementById(id);
            let value = parseInt(input.value, 10);
            if (!isNaN(value) && value > 1) {
                input.value = value - 1;
            }
        }
    </script>
</body>

</html>