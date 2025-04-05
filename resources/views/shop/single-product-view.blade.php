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

</head>

<body>
    <!-- Start Main Top -->
    @include('shop.components.header')
    <!-- End Main Top -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="{{asset('assets/images/products/'.$product->img1)}}" alt="First slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="{{asset('assets/images/products/'.$product->img2)}}" alt="Second slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="{{asset('assets/images/products/'.$product->img3)}}" alt="Third slide"> </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="{{asset('assets/images/products/'.$product->img1)}}" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="1">
                                <img class="d-block w-100 img-fluid" src="{{asset('assets/images/products/'.$product->img2)}}" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="2">
                                <img class="d-block w-100 img-fluid" src="{{asset('assets/images/products/'.$product->img3)}}" alt="" />
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{$product->name}}</h2>
                        <span>{{$product->shop}}</span>
                        <h5>Rs. {{$product->price}}</h5>
                        <span class="available-stock"><span>{{$product->qty}} available / <a href="#">{{$product->sold}} sold </a></span>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    @if (Auth::user())
                                    <a href="{{route('customer.add_to_cart',['product_id'=>$product->unique_id,])}}" class="hvr-hover btn-lg" type="button">Add to Cart</a>
                                    <button class="hvr-hover btn-lg"><i class="fas fa-heart"></i> Add to wishlist</button>
                                    @else
                                    <a class="hvr-hover btn-lg" href="/login">Add to Cart</a>
                                    <a class="hvr-hover btn-lg" href="/login"><i class="fas fa-heart"></i> Add to wishlist</a>
                                    @endif
                                </div>
                            </div>
                            <p>{{$product->description}}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

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