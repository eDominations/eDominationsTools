<?php
header("Access-Control-Allow-Origin: *");
?>
    <!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }}</title>
    <meta name="description" content="{{ env('APP_DESCRIPTION') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="" >

@yield('additional_styles')
    @yield('js_variables')
</head>


<body class="body">
@yield('content')
<!-- Scripts -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('additional_scripts')
</body>
<footer>
    @yield('footer')
</footer>
</html>
