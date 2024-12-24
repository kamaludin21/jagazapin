<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    {{-- @stack('seo') --}}
    <title>{{ env('APP_NAME') }}</title>
    <link rel="shortcut icon" href="{{ secure_asset('image/kejati-logo.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ secure_asset('/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('/dist/icons/font/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ secure_asset('owlcarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('owlcarousel/dist/assets/owl.theme.default.min.css') }}">
    @livewireStyles


    <style>
        body {
            font-family: 'Raleway', sans-serif;
        }

        /* Small devices (landscape phones, 576px and up) */
        /* @media (min-width: 576px) {} */

        /* Medium devices (tablets, 768px and up) */
        /* @media (min-width: 768px) {
            .navbar-nav .dropdown .nav-link:focus+.dropdown-menu {
                display: block;
            } */

        /* Hide the toggle icon on mobile */
        /* .navbar-toggler-icon {
                display: block !important;
            }

            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        } */

        /* Large devices (desktops, 992px and up) */
        @media (min-width: 992px) {}

        /* X-Large devices (large desktops, 1200px and up) */
        @media (min-width: 1200px) {}

        /* XX-Large devices (larger desktops, 1400px and up) */
        @media (min-width: 1400px) {}

        /* .navbar-nav .dropdown:hover .dropdown-menu {
            display: block;
        } */

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .carousel-item-overlay {
            position: relative;
        }

        .carousel-item-overlay::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .carousel-item-overlay .carousel-caption-overlay {
            position: absolute;
            /* top: 50%; */
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
        }

        .vh-10 {
            height: 10vh;
            object-fit: cover;
        }

        .vh-15 {
            height: 15vh;
            object-fit: cover;
        }

        .vh-20 {
            height: 20vh;
            object-fit: cover;
        }

        .vh-25 {
            height: 25vh;
            object-fit: cover;
        }

        .vh-50 {
            height: 50vh;
            object-fit: cover;
        }

        .vh-65 {
            height: 65vh;
            object-fit: cover;
        }

        .vh-75 {
            height: 75vh;
            object-fit: cover;
        }

        .text-shadow {
            /* text-shadow: 0 0 3px #1e293b; */
            text-shadow: 0 0 3px #0f172a;
            underline: none;
        }

        .custom-img {
            max-width: 100%;
            height: auto;
        }
    </style>
    @stack('style')
</head>

<body>
    @include('layouts.sections.navbar')
    @yield('container')
    @include('layouts.sections.footer')
    <script src="{{ secure_asset('/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ secure_asset('/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ secure_asset('/owlcarousel/dist/owl.carousel.min.js') }}"></script>
    @stack('script')
    @livewireScripts
</body>

</html>
