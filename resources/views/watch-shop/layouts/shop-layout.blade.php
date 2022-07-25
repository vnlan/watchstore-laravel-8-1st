<!DOCTYPE html>
<html lang="en">


<!-- molla/index-2.html  22 Nov 2019 09:55:32 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Watch</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    @yield('shop-title')
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('shop/assets/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('shop/assets/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('shop/assets/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('shop/assets/images/icons/site.html') }}">
    <link rel="mask-icon" href="{{ asset('shop/assets/images/icons/safari-pinned-tab.svg') }}" color="#666666">
    <link rel="shortcut icon" href="{{ asset('shop/assets/images/icons/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ asset('shop/assets/images/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    
    <link rel="stylesheet" href="{{asset('shop/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('shop/assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('shop/assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('shop/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('shop/assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('shop/assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('shop/assets/css/plugins/nouislider/nouislider.css') }}">
    @yield('shop-css')
</head>
    
<body>
    <div class="page-wrapper">
        @include('watch-shop.partials.header')



        @yield('shop-content')

        @include('watch-shop.partials.footer')
    </div>
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
<!-- Plugins JS File -->
<script src="{{asset('shop/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('shop/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('shop/assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset('shop/assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('shop/assets/js/superfish.min.js')}}"></script>
    <script src="{{asset('shop/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('shop/assets/js/wNumb.js') }}"></script>
    <script src="{{ asset('shop/assets/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ asset('shop/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('shop/assets/js/nouislider.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{asset('shop/assets/js/main.js')}}"></script>
</body>

@include('watch-shop.partials.mobile-menu')

<!-- molla/index-2.html  22 Nov 2019 09:55:42 GMT -->
</html>
