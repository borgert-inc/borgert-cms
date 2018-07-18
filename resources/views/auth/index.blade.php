<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>{{ config('borgert.name') }}</title>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400" rel="stylesheet"> 

        <!-- Bootstrap -->
        <link href="{!! asset('assets/components/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">

        <!-- Font Awesome Icons -->
        <link href="{!! asset('assets/components/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
        
        <!-- Style Admin -->
        <link href="{!! asset('assets/auth/css/all.css') !!}" rel="stylesheet">

        <!-- Favicon -->
        <link href="{!! asset('assets/admin/favicon.ico') !!}" rel="icon" type="image/x-icon" />

    </head>
    <body>

        <div class="auth">

            <br>
            <br>

            <div class="text-center">
                <img src="{{ asset('assets/admin/img/borgert-logo.png') }}" width="200px">
            </div>

            <br>

            @yield('content')

            <hr>
            
            <p class="text-center"> <small>{{ config('borgert.name') }} {{ date('Y') }}</small> </p>

        </div>

        <!-- jQuery -->
        <script type="text/javascript" src="{!! asset('assets/components/jquery/dist/jquery.min.js') !!}"></script>

        <!-- Bootstrap -->
        <script type="text/javascript" src="{!! asset('assets/components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>

        <!-- Scripts -->
        <script type="text/javascript" src="{!! asset('assets/auth/js/all.js') !!}"></script>

    </body>
</html>