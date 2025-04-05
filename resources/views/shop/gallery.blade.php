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
                <h2>Products</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Gallery  -->
    <div class="products-box">
        <div class="container">
            @if (!empty($sub_categories) && $sub_categories->count())
            <div class="row mb-4 ">
                <div class="col-12">
                    <span>Sub Categories</span>
                </div>
                <div class="col-12">
                    @foreach ($sub_categories as $sub_category)
                    <a href="" class="hvr-hover p-2">
                        {{ $sub_category->name }}
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="row">
                @foreach ($products as $product)
                <div class="col-lg-2 col-6">
                    <a href="/single-product-view/{{$product->id}}">
                        <div class="card hover-product">
                            <img src="{{asset('assets/images/products/'.$product->img1)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <h2 class="badge text-bg-warning shadow"> Rs. {{$product->price}}</h2>
                                <p class="badge text-bg-secondary">{{$product->qty}} items in stock</p>
                                @if (Auth::user())
                                <a href="{{route('customer.add_to_cart',['product_id'=>$product->unique_id,])}}" class="hvr-hover w-100 my-1 p-2 ">Add To Cart <i class="bi bi-bag-dash"></i></a>
                                <a href="#" class="hvr-hover w-100 my-1 p-2">Add To Favorites <i class="bi bi-bag-heart"></i></a>
                                @else
                                <a href="/login" class="hvr-hover w-100 my-1 p-2 ">Add To Cart <i class="bi bi-bag-dash"></i></a>
                                <a href="/login" class="hvr-hover w-100 my-1 p-2">Add To Favorites <i class="bi bi-bag-heart"></i></a>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Gallery  -->

    <!-- Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-success">{{ session('cart_add_success') }}</h5>
                </div>
                <div class="modal-body">
                    <div style="overflow-x: auto; white-space: nowrap; padding: 10px;">
                        @if(session('sujests'))
                        @foreach(session('sujests') as $item)
                        <div style="width: 160px; display: inline-block; margin-right: 10px; vertical-align: top;">
                            <a href="/single-product-view/{{$item->id}}">
                                <div class="card hover-product">
                                    <img src="{{asset('assets/images/products/'.$item->img1)}}" class="card-img-top" alt="Product Image">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{wordwrap($item->name,8)}}</h5>
                                        <h2 class="badge text-bg-warning shadow">Rs. {{$item->price}}</h2>
                                        <br>
                                        <p class="badge text-bg-secondary">{{$item->qty}} items in stock</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{route('customer.cart')}}" class="hvr-hover my-1 p-2">Go to cart <i class="bi bi-bag-dash"></i></a>
                </div>
            </div>
        </div>
    </div>

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