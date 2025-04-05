  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

  <div class="main-top">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="right-phone-box">
                      <p>Call US : <a href="#"> 077 – 3200312</a></p>
                  </div>
                  <div class="our-link">
                      <ul>
                          <li><a href="#"> Contact Us</a></li>
                          <li><a href="/aboutus"> About Us</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                  <div class="login-box">
                      @if (Auth::user())
                      <div class="our-link">
                          <ul>
                              <li>
                                  <div class="dropdown p-3">
                                      <a class="dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                          <i class="fa fa-user s_color"></i> My Account
                                      </a>
                                      <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">
                                          <li><a class="dropdown-item" href="#">Profile</a></li>
                                          <li><a class="dropdown-item" href="/order-my-orders">Orders</a></li>
                                          <li>
                                              <form method="POST" action="{{ route('logout') }}">
                                                  @csrf
                                                  <button type="submit" class="dropdown-item btn btn-link" style="text-decoration: none; font-weight: bold; color: red;">
                                                      Sign Out
                                                  </button>
                                              </form>
                                          </li>
                                      </ul>
                                  </div>
                              </li>
                          </ul>
                      </div>
                      @else
                      <div class="our-link">
                          <ul>
                              <li><a href="/login"><i class="fa fa-user s_color"></i> Login </a></li>
                          </ul>
                      </div>
                      @endif
                  </div>
                  <div class="text-slid-box">
                      <div id="offer-box" class="carouselTicker">
                          <ul class="offer-box">
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- End Main Top -->

  <header class="main-header">
      <!-- Start Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
          <div class="container">
              <!-- Start Header Navigation -->
              <div class="navbar-header">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                      <i class="fa fa-bars"></i>
                  </button>
                  <a class="navbar-brand" href="/"><img src="{{asset('shop/images/logo.jpg')}}" width="100" class="logo shadow" alt=""></a>
              </div>
              <!-- End Header Navigation -->

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="navbar-menu">
                  <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                      <li class="nav-item d-lg-block d-none">
                          <div class="input-group mt-1" style="width: 500px;">
                              <input type="text" class="form-control" placeholder="Search products" aria-describedby="basic-addon2">
                              <span class="input-group-text hvr-hover" style="cursor: pointer;" id="basic-addon2">Search</span>
                          </div>
                      </li>
                      <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                      <li class="nav-item"><a class="nav-link" href="/gallery">Products</a></li>
                  </ul>
              </div>
              <!-- /.navbar-collapse -->

              <!-- Start Atribute Navigation -->
              <div class="attr-nav">
                  <ul>
                      @if (Auth::user())
                      <li class="">
                          <a href="{{route('customer.favorites')}}">
                              <i class="fa fa-heart"></i>
                              <p style="display: inline-block;">My Favorites</p>
                              @php
                              $customer = \App\Models\Customer::where('email', Auth::user()->email)->first();
                              $cart = \App\Models\Favorite::where('customer_id', $customer->unique_id)
                              ->get();
                              @endphp
                              <small class="badge bg-danger">{{$cart->count()}}</small>
                          </a>
                      </li>
                      <li class="side-menu">
                          <a href="#">
                              <i class="fa fa-shopping-bag"></i>
                              <p>My Cart</p>
                              @php
                              $customer = \App\Models\Customer::where('email', Auth::user()->email)->first();
                              $cart = \App\Models\Cart::where('customer_id', $customer->unique_id)
                              ->whereNull('order_id')
                              ->get();
                              @endphp
                              <small class="badge bg-danger">{{$cart->count()}}</small>
                          </a>
                      </li>
                      @else
                      <li>
                          <a>
                              <i class="fa fa-heart"></i>
                              <span style="cursor: pointer;">My Favorites</span>
                          </a>
                      </li>
                      <li>
                          <a>
                              <i class="fa fa-shopping-bag"></i>
                              <span style="cursor: pointer;">My Cart</span>
                          </a>
                      </li>
                      @endif
                  </ul>

              </div>
              <div class="d-lg-none d-block">
                  <div class="input-group ms-4">
                      <input type="text" class="form-control" placeholder="Search products" aria-describedby="basic-addon2">
                      <span class="input-group-text" id="basic-addon2">Search</span>
                  </div>
              </div>
              <!-- End Atribute Navigation -->
          </div>
          <!-- Start Side Menu -->
          <div class="side">
              <a href="#" class="close-side"><i class="fa fa-times"></i></a>
              <li class="cart-box">
                  <ul class="cart-list">
                      @if (Auth::user())
                      @foreach ($cart as $item)
                      @php
                      $product = \App\Models\Products::where('unique_id', $item->product_id)->first();
                      @endphp
                      <li>
                          <a><img src="{{asset('assets/images/products/'.$product->img1)}}" class="cart-thumb" alt="" /></a>
                          <h6><a href="#">{{$product->name}}</a></h6>
                          <p>{{$item->qty}} x - <span class="price">{{$product->price}}</span></p>
                      </li>
                      @endforeach
                      @endif
                  </ul>
              </li>
              @if (Auth::user() && $cart->count() > 0)
              <a href="{{route('customer.cart')}}" class="hvr-hover w-100 my-1 p-2">Go to cart <i class="bi bi-bag-dash"></i></a>
              @else
              <a href="#" class="hvr-hover w-100 my-1 p-2">Cart is empty <i class="bi bi-bag-dash"></i></a>
              @endif
          </div>
          <!-- End Side Menu -->
      </nav>
      <!-- End Navigation -->
  </header>