<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>@yield('title') | {{ config('borgert.name') }}</title>

        @yield('seo')

        @section('stylesheet')

            <!-- Bootstrap -->
            <link href="{!! asset('assets/components/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">

            <!-- Font Awesome Icons -->
            <link href="{!! asset('assets/components/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">

            <!-- Styles -->
            <link href="{!! asset('assets/blog/css/all.css') !!}" rel="stylesheet">

        @show

    </head>
    <body>

        @yield('content')

        @section('javascrippt')
            <!-- jQuery -->
            <script type="text/javascript" src="{!! asset('assets/components/jquery/dist/jquery.min.js') !!}"></script>

            <!-- Bootstrap -->
            <script type="text/javascript" src="{!! asset('assets/components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>

            <!-- Scripts -->
            <script type="text/javascript" src="{!! asset('assets/blog/js/all.js') !!}"></script>
        @show

    </body>
</html>