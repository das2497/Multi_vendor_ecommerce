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

    <!-- Start Main Top -->
    @include('shop.components.header')
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <h2>About Us</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">About Us</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start About Page  -->
    <div class="about-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-frame"> <img class="img-fluid" src="{{asset('shop/images/logo.jpg')}}" alt="" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <p>එදිනෙදා ජීවිතයේ ඕන දේවල් ගන්න කඩ ගානේ, තැන තැන රස්තියාදු උන කාලේ ඉවරයි.
                        බණ්ඩාරවෙලට අලුතෙන්ම එන Mr. Delivery!
                        බණ්ඩාරවෙල අවට ඉන්න ඔයාට,<div class="br"></div>
                        - ඔයාගේ කැමැත්ත අනුව බණ්ඩාරවෙල අවට තියෙන ඕනම රෙස්ටුරන්ට් එකකින් අවශ්‍ය කෑම ගෙදරටම ඩිලිවරි කරලා දෙන්න අපිට පුළුවන්<br>
                        - ඒ විතරක් නෙමෙයි ඔයාගේ ගෙදරට අවශ්‍ය නැවුම් එළවළු, පළතුරු, මස් මාළු, ගෑස් සිලින්ඩර් කුළුබඩු ඇතුළු සියලුම ග්‍රොසරි බඩු වගේම,<br>
                        - හරිම දිනයට Birthday cake, Surprise gift ඔයාගේ අතටම ගෙනත් දෙන්නත්,<br>
                        - ඔයාට අවශ්‍ය ඖෂධ වර්ග ෆාමසියෙන් නිවරදිව මිලදීගෙන ඔයාට ඩිලිවරි කරන්නත්,<br>
                        - ඔයාට අවශ්‍ය කිරි ආශ්‍රිත නිෂ්පාදන නිවසටම ගෙනත් දෙන්නත්,<br>
                        Mr. Delivery අපි සූදානම්!<div class="br"></div>  <br>                      
                        සදුදා හැර සතියේ අනිත් දින 6 පුරාම, උදේ 5.30 සිට රාත්‍රී 11.30 දක්වා ඇනවුම ලැබී පැය එක හමාරක් ඇතුලත අපේ පළපුරුදු සේවක මහතුන් අතින් ඔයාට අවශ්‍ය භාණ්ඩ ඔයාගේ අතටම පත් කරන්න අපි සූදානමින් ඉන්නවා.
                        ඔයාගේ ඇනවුම,<div class="br"></div>  <br/>
                        අපේ වට්සැප් අංකය 077 – 3200312 හරහා හෝ www.mrdelivery.lk අපේ වෙබ් අඩවිය හරහා අපිට ලබා දෙන්න පුළුවන්.
                        පාරිභෝගික ඔබගේ පහසුව සදහාම,<br>
                        - Cash on delivery <br>
                        - Online transfer සහ <br>
                        - Card Payment <br>
                        යන ක්‍රම තුනෙන්ම ගෙවීම් කරන්න පුළුවන්.
                        කාර්යබහුල ඔයාගේ ජීවිතය පහසු කරවන්න, ඔයාට අවශ්‍ය භාණ්ඩ හිතා ගන්නවත් බැරි තරම් ඉක්මනට ඔයාගේ අතට පත් කරවන Mr delivery අපේ සර්විස් එකත් එක්ක අදම එකතු වෙන්න.
                        හිතන පරක්කුවට ඔයාට ඕන භාණ්ඩය ඔයාගේ අතටම! <br>
                        Mr. Delivery!</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Start Footer  -->
    @include('shop.components.footer')
    <!-- End copyright  -->

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
</body>

</html>