<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ririsu') }}</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('css/modernmag-assets.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div id="app">

        @include('shared.header')

        <main class="py-4">
            @yield('content')
        </main>

        @include('shared.footer')

    </div>
    @include('shared.loginmodal')
    <ul class="pagination-list">
        <li><a href="#">Prev</a></li>
        <li><a href="#" class="active">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">...</a></li>
        <li><a href="#">6</a></li>
        <li><a href="#">Next</a></li>
    </ul>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/modernmag-plugins.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/gmap3.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    
</body>
</html>
