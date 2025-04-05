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
                    <li class="breadcrumb-item active">Cart</li>
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
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Update</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                                @endphp
                                @foreach($cart_items as $cart_item)
                                @php
                                $total += $cart_item->total;
                                @endphp
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
                                            <img class="img-fluid" src="{{asset('assets/images/products/'.$cart_item->img1)}}" alt="" />
                                        </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
                                            {{$cart_item->name}}
                                        </a>
                                    </td>
                                    <td class="price-pr">
                                        <p>Rs.{{number_format($cart_item->price,2)}}</p>
                                    </td>
                                    <form action="/update-cart" method="POST">
                                        @csrf
                                        <td class="quantity-box">
                                            <div class="counter">
                                                <div class="button" onclick="decrement('{{$cart_item->id}}')">-</div>
                                                <input
                                                    type="number"
                                                    style="min-width: 50px; max-width: 200px;"
                                                    size="4"
                                                    value="{{$cart_item->qty}}"
                                                    min="1"
                                                    step="1"
                                                    name="qty"
                                                    class="qty-input"
                                                    id="{{$cart_item->id}}">
                                                <div class="button" onclick="increment('{{$cart_item->id}}')">+</div>
                                            </div>
                                        </td>
                                        <td class="total-pr">
                                            <p>Rs.{{ number_format($cart_item->total, 2) }}</p>
                                        </td>
                                        <td>
                                            <input type="hidden" name="cart_item_id" value="{{$cart_item->id}}">
                                            <button
                                                type="submit"
                                                class="update"
                                                style="background: none; border: none; color: orangered; cursor: pointer;">
                                                <i class="fas fa-sync-alt"></i>
                                            </button>
                                        </td>
                                    </form>
                                    <form action="/remove-from-cart" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <td class="remove-pr">
                                            <input type="hidden" name="cart_item_id" value="{{$cart_item->id}}">
                                            <button type="submit" class="remove" style="background: none; border: none; color: orangered; cursor: pointer;">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>

                        <div class="d-flex gr-total">
                            <h5 style="color: orangered;">Grand Total</h5>
                            <div class="ml-auto h5"> Rs.{{number_format($total,2)}} </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-12 col-lg-2 offset-lg-8 d-grid shopping-box"><a href="{{route('customer.checkout')}}" class="hvr-hover my-1 p-2">Checkout</a> </div>
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