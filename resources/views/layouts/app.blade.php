<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Import Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Import CSS file -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('title')</title>
</head>

<body>
<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-light-gray">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" id="burger"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="{{ route('home') }}" id="mobile-logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="48" xmlns:xlink="http://www.w3.org/1999/xlink"
                 viewBox="0 0 301.12 446.66">
                <defs>
                    <style>.cls-1 {
                            fill: url(#linear-gradient);
                        }

                        .cls-2 {
                            fill: url(#linear-gradient-2);
                        }

                        .cls-3 {
                            fill: url(#linear-gradient-3);
                        }</style>
                    <linearGradient id="linear-gradient" x1="185.42" y1="283.24" x2="-1.84" y2="126.11"
                                    gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#f6bc21"/>
                        <stop offset="1" stop-color="#e00048"/>
                    </linearGradient>
                    <linearGradient id="linear-gradient-2" x1="274.78" y1="311.77" x2="101.99" y2="209.87"
                                    gradientUnits="userSpaceOnUse">
                        <stop offset="0.04" stop-color="#f6bc21"/>
                        <stop offset="1" stop-color="#e00048"/>
                    </linearGradient>
                    <linearGradient id="linear-gradient-3" x1="305.3" y1="327.16" x2="174.16" y2="217.28"
                                    xlink:href="#linear-gradient"/>
                </defs>
                <g id="Layer_2" data-name="Layer 2">
                    <g id="objects">
                        <path class="cls-1"
                              d="M185,442.7A150.68,150.68,0,0,1,0,296.1C0,175.11,121.55,162.66,132.3,0A644.75,644.75,0,0,1,187,53.86c35.73,44.67-65.85,152.3-87.12,243.86C85.49,359.87,123.07,453.51,185,442.7Z"/>
                        <path class="cls-2"
                              d="M274.77,381.2a150.63,150.63,0,0,1-89.69,61.49H185c-61.93,10.81-109.79-44.56-92.76-145S222.77,98.53,187,53.86a570.71,570.71,0,0,1,39.77,49.35c11.33,18.29,19,28.41,14.89,71.64-4.44,47.06-24.85,95.18-44.31,136.46C175.53,357.68,237.58,434.83,274.77,381.2Z"/>
                        <path class="cls-3"
                              d="M301.12,296.1a149.79,149.79,0,0,1-26.26,85l-.09.13c-37.19,53.63-127.88,15.5-88-72.85,18.77-41.6,45.46-94.54,51.06-141.48,2.79-23.43.32-45.37-11-63.66C277.69,174.25,301.12,243.78,301.12,296.1Z"/>
                    </g>
                </g>
            </svg>
        </a>
        <!-- Left Element -->
        <div class="collapse navbar-collapse">
            <div class="navbar-nav me-auto">
                <a class="nav-link d-lg-none" href="index.html">Logo</a>
            </div>
        </div>
        <!-- End Left Element -->
        <!-- Center Element -->
        <div class="collapse navbar-collapse p-2 p-lg-0" id="collapse-menu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 m-auto">
                <x-nav-link route="home">Αρχική</x-nav-link>
                <x-nav-link route="search">Αναζήτηση</x-nav-link>
                @if(\App\Models\User::isUserLog())
                    <x-nav-link route="import">Καταχώρηση</x-nav-link>
                @endif
                <x-nav-link route="announcements">Ανακοινώσεις</x-nav-link>
            </ul>
        </div>
        <!-- End Center Element -->
        <!-- Right Element -->
        <div class="collapse navbar-collapse">
            <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if(\App\Models\User::$isUserLog)
                    <a href="{{ route('logout') }}"
                       class="btn btn-secondary rounded-xxl px-4 border border-dark border-2 bg-dark-gray">Logout</a>
                @else
                    <a href="{{ route('login') }}"
                       class="btn btn-secondary rounded-xxl px-4 border border-dark border-2 bg-dark-gray">Login</a>
                @endif
            </div>
        </div>
        <!-- End Right Element -->
    </div>
</nav>

{{-- Alert Component for the user message --}}
@if((isset($message) && isset($type)))
    <x-alert type="{{$type}}" message="{{$message}}"/>
@endif
{{-- Alert Messages with redirect return view --}}
@if( Session::has('message') )
    <x-alert type="{{Session::get('type')}}" message="{{Session::get('message')}}"/>
@endif

@yield('content')

<!-- Footer -->
<footer class="bg-light-gray p-3">
    <div class="container">
        <div class="row">
            <div class="col-6 text-center">
                <a href="http://" class="text-white text-decoration-blue">Όροι χρήσης</a>
            </div>
            <div class="col-6 text-center">
                <a href="http://" class="text-white text-decoration-blue">Πολιτική Απορρήτου</a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/validation/rules/form-rules.js') }}"></script>
<script src="{{ asset('js/validation/validation.js') }}"></script>
<script src="{{ asset('js/form-validations.js') }}"></script>

</body>

</html>
