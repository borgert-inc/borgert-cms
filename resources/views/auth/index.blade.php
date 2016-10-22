<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>{{ config('borgert.name') }}</title>

        <link href="{!! asset('assets/components/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('assets/components/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
        
        <link href="{!! asset('assets/components/animate.css/animate.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('assets/admin/css/app.css') !!}" rel="stylesheet">

        <link href="{!! asset('assets/admin/favicon.ico') !!}" rel="icon" type="image/x-icon" />

    </head>
    <body class="gray-bg">

        <br>
        <br>

        <div class="text-center">
            <img src="{{ asset('assets/admin/img/borgert-logo.png') }}" width="250px">
        </div>

        <br>

        @yield('content')

        <hr>
        
        <p class="m-t text-center"> <small>{{ config('borgert.name') }} {{ date('Y') }}</small> </p>

        <!-- Mainly scripts -->
        <script src="{!! asset('assets/components/jquery/dist/jquery.min.js') !!}"></script>
        <script src="{!! asset('assets/components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>

    </body>
</html>