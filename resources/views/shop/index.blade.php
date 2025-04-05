<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Mr.Delivery</title>
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
        .next,
        .prev {
            border: 0 solid black;
            border-radius: 8px;
            box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px,
                rgba(0, 0, 0, 0.23) 0px 6px 6px;
            background-color: orangered;
            color: #f0f0f0;
            margin: 10px;
        }

        .next:hover,
        .prev:hover {
            box-shadow: rgba(0, 0, 0, 0.61) 0px 16px 26px,
                rgba(0, 0, 0, 0.6) 0px 10px 10px;
            color: #f0f0f0;
        }
    </style>

</head>

<body>
    <!-- Start Main Top -->

    <!-- Start Main Top -->
    @include('shop.components.header')
    <!-- End Main Top -->

    <div class="container">
        <div class="row">
            <div class="col-md-3 pt-2 border rounded">
                <h4>Categories</h4>
                <div class="list-group">
                    @foreach ($product_categories_all as $category)
                    <a href="/gallery/by-catogory/{{$category->name}}" class="list-group-item list-group-item-action">
                        {{$category->name}}
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-9">
                <!-- Start Slider -->
                <div id="slides-shop" class="cover-slides" style="height: 400px;">
                    <ul class="slides-container">
                        <li class="text-center">
                            <img src="shop/images/banner-01.jpg" alt="">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="m-b-20"><strong>Welcome To <br> Mr. Delivery</strong></h1>
                                        <p><a class="hvr-hover" href="/gallery">Shop New</a></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="text-center">
                            <img src="shop/images/banner-02.jpg" alt="">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="m-b-20"><strong>Welcome To <br> Mr. Delivery</strong></h1>
                                        <p><a class="hvr-hover" href="/gallery">Shop New</a></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="text-center">
                            <img src="shop/images/banner-03.jpg" alt="">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="m-b-20"><strong>Welcome To <br> Mr. Delivery</strong></h1>
                                        <p><a class="hvr-hover" href="/gallery">Shop New</a></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="slides-navigation">
                        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </div>
                </div>
                <!-- End Slider -->
            </div>
        </div>
    </div>

    <div class="container-fluid mt-2">
        <div class="row">
            <div class="title-all text-center">
                <h1>Shops</h1>
            </div>
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    @foreach ($shops as $shop)
                    <a href="/gallery/by-shop/{{$shop->name}}" class="mx-2 text-center">
                        <img class="img-thumbnail" src="{{asset('assets/images/shop/'.$shop->img)}}" width="100" alt="" />
                        <p class="text-center m-0" style="color: orangered;">{{$shop->name}}</p>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Latest Products</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                @if(session('success_favorite'))
                <div class="alert alert-success">
                    {{ session('success_favorite') }}
                </div>
                @endif
                @foreach ($latest_products as $latest_product)
                <div class="col-lg-2 col-6">
                    <a href="/single-product-view/{{$latest_product->id}}">
                        <div class="card hover-product">
                            <img src="{{asset('assets/images/products/'.$latest_product->img1)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$latest_product->name}}</h5>
                                <h2 class="badge text-bg-warning shadow"> Rs. {{number_format($latest_product->price,2)}}</h2>
                                <span class="badge text-bg-secondary shadow">{{$latest_product->qty}} items in stock</span>
                                @if (Auth::user())
                                <a href="{{route('customer.add_to_cart',[
                                'product_id'=>$latest_product->unique_id,
                                ])}}" class="hvr-hover w-100 my-1 p-2 ">Add To Cart <i class="bi bi-bag-dash"></i></a>
                                <a href="{{route('customer.add_to_favorite',['product_id'=>$latest_product->unique_id])}}" class="hvr-hover w-100 my-1 p-2">Add To Favorites <i class="bi bi-bag-heart"></i></a>
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
    <!-- End Products  -->

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            @foreach ($carousel_products as $carousel_product)
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('assets/images/products/'.$carousel_product->img1)}}" alt="" />
                    <div class="hov-in">
                        <a href="#">
                            <button class="hvr-hover w-100 my-1 p-2">View</button>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- End Instagram Feed  -->

    <!-- Start Footer  -->
    @include('shop.components.footer')
    <!-- End Footer  -->

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
                                        <h5 class="card-title">{{$item->name}}</h5>
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