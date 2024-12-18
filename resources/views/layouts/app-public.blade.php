<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Sportstore">
        <meta name="keywords" content="ecommerce,sport">
        <meta name="author" content="422023023-kevin">

        <title>@yield('title') | GG-ECOMMERCE</title>

        <link rel="icon" type="image/x-icon" href="{{asset('assets/images/favicon.ico')}}">
        <!-- BEGIN CSS Assets-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendor/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendor/linearicons.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendor/fontawesome-all.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/animation.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/slick.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/magnific-popup.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/easyzoom.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
        @yield('addition_css')
        <style>
    <style>
    /* General Styling */
    body {
        background-color: #f9f9f9;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        line-height: 1.6;
    }

    .container {
        max-width: 900px;
        padding: 20px 15px;
    }

    h3 {
        color: #333;
        font-weight: 600;
        margin-bottom: 20px;
    }

    h5 {
        font-size: 16px;
        font-weight: 500;
        color: #555;
        margin-bottom: 15px;
    }

    h4 {
        font-size: 18px;
        color: #444;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .card {
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .card-body {
        padding: 25px;
    }

    .form-group label {
        font-weight: 500;
        font-size: 14px;
        color: #555;
        margin-bottom: 8px;
        display: block;
    }

    /* Table Styling */
    .table {
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .table thead {
        background-color: #977450; /* Warna coklat muda */
        color: #fff;
    }

    .table thead th {
        text-align: left;
        padding: 10px;
        font-size: 14px;
    }

    .table tbody td {
        padding: 12px;
        color: #333;
        vertical-align: middle;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .table tbody tr td {
        font-size: 13px;
    }

    /* Alert Styling */
    .alert {
        border-radius: 8px;
        padding: 15px;
        font-size: 13px;
        background-color: #fdf7f7;
        border-color: #f8d7da;
        color: #721c24;
        margin-top: 15px;
    }

    .alert strong {
        font-weight: 600;
    }

    /* Button Styling */
    .btn-primary {
        background-color:rgb(42, 176, 65);
        border: none;
        border-radius: 6px;
        padding: 0px 20px;
        font-size: 15px;
        font-weight: 700;
        color: #fff;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: rgb(21, 103, 35);
    }

    /* Spacing */
    .form-group {
        margin-bottom: 20px;
    }

    /* Responsive Styling */
    @media (max-width: 768px) {
        .container {
            padding: 10px;
        }

        h3, h4, h5 {
            font-size: 16px;
        }

        .table tbody tr td {
            font-size: 12px;
        }
    }
</style>

        <!-- END CSS Assets-->
    </head>
    <body class="box-home">
        <div class="page-box">
            @include('components.header')
            <div id="main-wrapper">
                @yield('content')
                @include('components.footer')
            </div>
        </div>

        <!-- BEGIN: JS Assets-->
        <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
        <script src="{{asset('assets/js/vendor/axios.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/fullpage.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/slick.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/magnific-popup.js')}}"></script>
        <script src="{{asset('assets/js/plugins/easyzoom.js')}}"></script>
        <script src="{{asset('assets/js/plugins/images-loaded.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/isotope.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/YTplayer.js')}}"></script>
        <!-- Instagramfeed JS -->
        <!-- <script src="{{ asset('assets/js/plugins/jquery.instagramfeed.min.js') }}"></script> -->
        <script src="{{asset('assets/js/plugins/ajax.mail.js')}}"></script>
        <script src="{{asset('assets/js/plugins/wow.min.js')}}"></script>
        <!-- Plugins JS (Please remove the comment from below plugins.min.js for better website load performance and remove plugin js files from above) -->
        <!-- <script src="{{ asset('assets/js/plugins/plugins.min.js') }}"></script> -->
        <script src="{{asset('assets/js/main.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{asset('pages/js/app.js')}}"></script>
        @yield('addition_script')
        <!-- END: JS Assets-->
    </body>
</html>