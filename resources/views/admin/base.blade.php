<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>@yield('title') | {{ config('borgert.name') }}</title>

        @section('stylesheet')

            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400" rel="stylesheet"> 
        
            <!-- Bootstrap -->
            <link href="{!! asset('assets/components/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">

            <!-- Font Awesome Icons -->
            <link href="{!! asset('assets/components/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">

            <!-- Summernote -->
            <link href="{!! asset('assets/components/summernote/dist/summernote-lite.css') !!}" rel="stylesheet">

            <!-- Metis Menu -->
            <link href="{!! asset('assets/components/metisMenu/dist/metisMenu.min.css') !!}" rel="stylesheet">

            <!-- Blueimp Jquery File Upload -->
            <link href="{!! asset('assets/components/blueimp-file-upload/css/jquery.fileupload.css') !!}" rel="stylesheet">
            <link href="{!! asset('assets/components/blueimp-file-upload/css/jquery.fileupload-ui.css') !!}" rel="stylesheet">

            <!-- Bootstrap datetimepicker -->
            <link href="{!! asset('assets/components/datetimepicker/jquery.datetimepicker.css') !!}" rel="stylesheet">

            <!-- Switch Chery -->
            <link href="{!! asset('assets/components/switchery/dist/switchery.min.css') !!}" rel="stylesheet" />

            <!-- Style Admin -->
            <link href="{!! asset('assets/admin/css/all.css') !!}" rel="stylesheet">

            <!-- Favicon -->
            <link href="{!! asset('assets/admin/favicon.ico') !!}" rel="icon" type="image/x-icon" />

        @show

    </head>
    <body>

    <!-- Header -->
    <header class="navbar navbar-expand fixed-top flex-column flex-md-row shadow-sm">
        <a class="navbar-brand" href="{{ route('admin.index') }}">
            <img src="{{ asset('assets/admin/img/borgert-navbar.png') }}">
        </a>
        <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex navbar-user">
            <li>@lang('admin/_globals.hello') <strong><a href="{{ route('admin.profile.profile') }}">{{ Auth::user()->name }}</a></strong></li>
            <li><img src="{{ Gravatar::src(Auth::user()->email, 60) }}" class="rounded-circle" height="30"></li>
            <li><a href="{{ route('auth.logout') }}"><i class="fa fa-sign-out-alt"></i> @lang('admin/_globals.exit')</a></li>
        </ul>
    </header>

    <div class="container-fluid full-height">
        <div class="row full-height">
            <div class="col-12 col-sm-3 col-lg-3 col-md-3 col-xl-2 full-height sidebar">

                <!-- Menu -->
                @include('admin._inc.menu')

                <!-- Footer -->
                <footer class="footer">
                    <div>
                        <strong>{{ config('borgert.name') }}</strong> - {{ date('Y') }} <br>
                        <a href="{{ config('borgert.opensource') }}" target="_blank"><i class="fa fa-github-alt"></i> OpenSource v. <strong>{{ config('borgert.version') }}</strong></a>
                    </div>
                </footer>

            </div>

            <!-- Main -->
            <main class="col-12 col-sm-9 col-lg-9 col-md-9 col-xl-10 main-content">

                <!-- Alerts -->
                @include('admin._inc.alerts')

                <!-- Content -->
                @yield('content')
            </main>
        </div>
    </div>

        @section('javascript')
            
            <!-- jQuery -->
            <script type="text/javascript" src="{!! asset('assets/components/jquery/dist/jquery.min.js') !!}"></script>

            <!-- Bootstrap -->
            <script type="text/javascript" src="{!! asset('assets/components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>

            <!-- Metis Menu -->
            <script type="text/javascript" src="{!! asset('assets/components/metisMenu/dist/metisMenu.min.js') !!}"></script>

            <!-- Summernote (Editor) -->
            <script type="text/javascript" src="{!! asset('assets/components/summernote/dist/summernote-lite.js') !!}"></script>
            <script type="text/javascript" src="{!! asset('assets/components/summernote/dist/lang/summernote-pt-BR.min.js') !!}"></script>

            <!-- Datetimepicker -->
            <script type="text/javascript" src="{!! asset('assets/components/datetimepicker/build/jquery.datetimepicker.full.min.js') !!}"></script>

            <!-- Switchery -->
            <script type="text/javascript" src="{!! asset('assets/components/switchery/dist/switchery.min.js') !!}"></script>

            <!-- Scripts -->
            <script type="text/javascript" src="{!! asset('assets/admin/js/all.js') !!}"></script>

        @show

    </body>
</html>