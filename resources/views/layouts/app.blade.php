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
            Logo
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

{{-- Alert Messages with return view --}}
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
