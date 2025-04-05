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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                <h2>Checkout</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Checkout  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Cart items</h3>
                        </div>
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
                                                                style="min-width: 50px;"
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
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <form action="{{route('customer.checkout-place-order')}}" method="POST">
                        @csrf
                        <div class="row">
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
                            <div class="col-md-12 col-lg-12">
                                <div class="shipping-method-box">
                                    <div class="title-left">
                                        <h3>Payment Method</h3>
                                    </div>
                                    <div class="mb-4">
                                        <div class="custom-control custom-radio">
                                            <input id="shippingOption1" name="payment_option" value="Cash on delivery" class="custom-control-input" checked="checked" type="radio">
                                            <label class="custom-control-label" for="shippingOption1">Cash On Delivery</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="odr-box">
                                    <div class="title-left">
                                        <h3>Address list</h3>
                                    </div>
                                    <div class="col-12 d-flex shopping-box">
                                        <button class="hvr-hover my-1 p-2" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Address</button>
                                    </div>
                                    <div class="mb-4">
                                        @if (!$address_list->isEmpty())
                                        @foreach ($address_list as $address)
                                        <div class="custom-control custom-radio border border-1 mt-2">
                                            <input id="AddressOption{{$address->id}}" name="address_option"
                                                class="custom-control-input address-option" value="{{$address->id}}" type="radio">
                                            <label class="custom-control-label" for="AddressOption{{$address->id}}">
                                                <p>{{$address->receiver_name}}</p>
                                                <p>{{$address->address_1}} | {{$address->zone}}</p>
                                                <p>{{$address->contact_1}}</p>
                                            </label>
                                        </div>
                                        @endforeach
                                        @else
                                        <p>No address found. Please add an address.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="order-box">
                                    <div class="title-left">
                                        <h3>Order Summary</h3>
                                    </div>
                                    <hr class="my-1">
                                    <div class="d-flex">
                                        <h4>Sub Total</h4>
                                        <div class="ml-auto font-weight-bold"> Rs. <span id="total">{{$total}}</span> </div>
                                    </div>
                                    <hr class="my-1">
                                    <div class="d-flex">
                                        <h4>Note</h4>
                                        <textarea name="note" id="" class="form-control ms-2"></textarea>
                                    </div>
                                    <hr class="my-1">
                                    <div class="d-flex">
                                        <div class="coupon-box w-100 mt-2">
                                            <div class="input-group input-group-sm">
                                                <input class="form-control rounded-4" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                                                <div class="input-group-append">
                                                    <button class="hvr-hover my-1 p-2" type="button">Apply Coupon</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <h4>Coupon Discount</h4>
                                        <div class="ml-auto font-weight-bold"></div>
                                    </div>
                                    <div class="d-flex">
                                        <h4>Shipping Cost</h4>
                                        <div class="ml-auto font-weight-bold" id="shipping_cost"> </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex gr-total">
                                        <h5 style="color: black;">Grand Total</h5>
                                        <div class="ml-auto h5" id="grand_total"> </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <input type="hidden" id="address_id" name="address_id">
                            <input type="hidden" name="total" id="final_total">
                            <div class="col-12 d-flex shopping-box"> <button type="submit" class="hvr-hover my-1 p-2">Place Order</button> </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- End Checkout -->


    <!-- Start Footer  -->
    @include('shop.components.footer')
    <!-- End Footer  -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Address</h1>
                </div>
                <div class="modal-body">
                    <form action="{{route('customer.checkout-add-address')}}" method="POST">
                        @csrf
                        <!-- Name Field -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ old('name') }}" placeholder="Enter name">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Address Field -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                id="address" name="address" value="{{ old('address') }}" placeholder="Enter address">
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Zone Field -->
                        <div class="mb-3">
                            <label for="zone" class="form-label">Zone</label>
                            <select name="zone" id="zone" class="form-select @error('zone') is-invalid @enderror">
                                <option value="">Select your zone</option>
                                @foreach($zone_list as $zone)
                                <option value="{{$zone->zone_name}}" {{ old('zone') == $zone->zone_name ? 'selected' : '' }}>{{$zone->zone_name}}</option>
                                @endforeach
                            </select>
                            @error('zone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Contact 1 Field -->
                        <div class="mb-3">
                            <label for="contact_1" class="form-label">Contact 1</label>
                            <input type="text" class="form-control @error('contact_1') is-invalid @enderror"
                                id="contact_1" name="contact_1" value="{{ old('contact_1') }}" placeholder="Enter Contact 1">
                            @error('contact_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Contact 2 Field -->
                        <div class="mb-3">
                            <label for="contact_2" class="form-label">Contact 2</label>
                            <input type="text" class="form-control @error('contact_2') is-invalid @enderror"
                                id="contact_2" name="contact_2" value="{{ old('contact_2') }}" placeholder="Enter Contact 2">
                            @error('contact_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="hvr-hover my-1 p-2">Add</button>
                </div>
                </form>
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

    <script>
        $(document).ready(function() {
            // Attach change event to radio buttons
            $('.address-option').change(function() {
                let address_id = $(this).val(); // Get selected address ID
                let csrfToken = $('meta[name="csrf-token"]').attr('content');
                let total = $('#total').html(); // Update the grand total

                // alert(zone + ' ' + csrfToken);

                // AJAX request
                $.ajax({
                    url: "{{ route('customer.checkout-get-shipping-cost') }}", // Define this route in web.php
                    type: "POST",
                    data: {
                        _token: csrfToken,
                        address_id: address_id
                    },
                    success: function(response) {
                        if (response.success) {
                            // alert(response.get_shipping_cost); // Notify the user
                            let grandTotal = parseFloat(total) + parseFloat(response.get_shipping_cost);

                            // $('#grand_total').html(''); // Update the grand total
                            $('#shipping_cost').html('Rs.' + response.get_shipping_cost); // Update the shipping cost
                            $('#grand_total').html('Rs.' + grandTotal); // Update the grand total
                            $('#final_total').val(grandTotal); // Update the grand total
                            $('#address_id').val(address_id); // Update the address ID
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText); // Debugging
                    }
                });
            });
        });
    </script>
</body>

</html>