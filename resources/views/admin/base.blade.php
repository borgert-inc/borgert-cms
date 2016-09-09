<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>@yield('title') | {{ config('borgert.name') }}</title>

        @section('stylesheet')
        
            <!-- Bootstrap -->
            <link href="{!! asset('assets/components/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">

            <!-- Font Awesome Icons -->
            <link href="{!! asset('assets/components/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
            
            <!-- Summernote -->
            <link href="{!! asset('assets/components/summernote/dist/summernote.css') !!}" rel="stylesheet">
            
            <!-- Animate.css -->
            <link href="{!! asset('assets/components/animate.css/animate.min.css') !!}" rel="stylesheet">

            <!-- Bootstrap datetimepicker -->
            <link href="{!! asset('assets/components/datetimepicker/jquery.datetimepicker.css') !!}" rel="stylesheet">
            
            <!-- Blueimp Jquery File Upload -->
            <link href="{!! asset('assets/components/blueimp-file-upload/css/jquery.fileupload.css') !!}" rel="stylesheet">
            <link href="{!! asset('assets/components/blueimp-file-upload/css/jquery.fileupload-ui.css') !!}" rel="stylesheet">

            <!-- App -->
            <link href="{!! asset('assets/admin/css/app.css') !!}" rel="stylesheet">

        @show

    </head>
    <body class="fixed-sidebar">
        <div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu">
                        <li class="nav-header text-center">
                            <div class="profile-element">
                                <img src="{{ asset('assets/admin/img/borgert.png') }}">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">{{ config('borgert.name') }}</strong>
                                </span>
                            </div>
                            <div class="logo-element">
                                <i class="fa fa-diamond"></i>
                            </div>
                        </li>
                        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">@lang('admin/dashboard.module')</span></a></li>
                        <li>
                            <a href="#"><i class="fa fa-comments"></i> <span class="nav-label">@lang('admin/blog.module')</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ route('admin.blog.categorys.list') }}">@lang('admin/blog.submodule.categorys')</a></li>
                                <li><a href="{{ route('admin.blog.posts.list') }}">@lang('admin/blog.submodule.posts')</a></li>
                                <li><a href="{{ route('admin.blog.comments.list') }}">@lang('admin/blog.submodule.comments')</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file-text"></i> <span class="nav-label">@lang('admin/pages.module')</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ route('admin.pages.categorys.list') }}">@lang('admin/pages.submodule.categorys')</a></li>
                                <li><a href="{{ route('admin.pages.contents.list') }}">@lang('admin/pages.submodule.contents')</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube"></i> <span class="nav-label">@lang('admin/products.module')</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ route('admin.products.categorys.list') }}">@lang('admin/products.submodule.categorys')</a></li>
                                <li><a href="{{ route('admin.products.contents.list') }}">@lang('admin/products.submodule.contents')</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('admin.gallerys.list') }}"><i class="fa fa-photo"></i> <span class="nav-label">@lang('admin/gallerys.module')</span></a></li>
                        <li><a href="{{ route('admin.mailbox.inbox') }}"><i class="fa fa-envelope"></i> <span class="nav-label">@lang('admin/mailbox.module')</span></a></li>
                        <li><a href="{{ route('admin.users.list') }}"><i class="fa fa-users"></i> <span class="nav-label">@lang('admin/users.module')</span></a></li>
                    </ul>
                </div>
            </nav>
            <div id="page-wrapper" class="gray-bg dashbard-1">

                <!-- Navbar -->
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-default" href="#"><i class="fa fa-bars"></i> </a>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li><span class="m-r-sm text-muted welcome-message">@lang('admin/_globals.hello') <strong><a href="{{ route('admin.profile.profile') }}" class="no-padding">
                                {{ Auth::user()->name }}</a></strong></span>
                            <img src="{{ Gravatar::src(Auth::user()->email, 60) }}" class="img-circle" height="32"></li>
                            <li><a href="{{ route('auth.logout') }}"><i class="fa fa-sign-out"></i> @lang('admin/_globals.exit')</a></li>
                        </ul>
                    </nav>
                </div>

                <!-- Content -->
                <div class="row">
                    <div class="col-lg-12">
                        @yield('sidebar')
                        <div class="wrapper wrapper-content">
                            @include('admin._inc.alerts')
                            @yield('content')
                            <br>
                        </div>
                    </div>
                </div>
                
                <!-- Footer -->
                <div class="footer">
                    <div class="pull-right"><a href="{{ config('borgert.opensource') }}" target="_blank"><u>Open Source</u> <i class="fa fa-github"></i></a> - <strong>{{ config('borgert.version') }}</strong></div>
                    <div><strong>{{ config('borgert.name') }}</strong> - {{ date('Y') }}</div>
                </div>

            </div>
        </div>

        @section('javascript')

            <!-- Mainly scripts -->
            <script type="text/javascript" src="{!! asset('assets/components/jquery/dist/jquery.min.js') !!}"></script>

            <!-- jQuery UI -->
            <script type="text/javascript" src="{!! asset('assets/components/jquery-ui/jquery-ui.min.js') !!}"></script>

            <!-- Bootstrap -->
            <script type="text/javascript" src="{!! asset('assets/components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
            
            <!-- Menu (Scroll && Toogle ) -->
            <script type="text/javascript" src="{!! asset('assets/components/slimScroll/jquery.slimscroll.min.js') !!}"></script>
            <script type="text/javascript" src="{!! asset('assets/components/metisMenu/dist/metisMenu.min.js') !!}"></script>

            <!-- ChartJS-->
            <!-- <script type="text/javascript" src="{!! asset('assets/components/Chart.js/dist/Chart.min.js') !!}"></script> -->

            <!-- Summernote (Editor) -->
            <script type="text/javascript" src="{!! asset('assets/components/summernote/dist/summernote.min.js') !!}"></script>
            <script type="text/javascript" src="{!! asset('assets/components/summernote/dist/lang/summernote-pt-BR.min.js') !!}"></script>

            <!-- Bootstrap datetimepicker -->
            <script src="{!! asset('assets/components/datetimepicker/build/jquery.datetimepicker.full.min.js') !!}" type="text/javascript"></script>

            <!-- Pace (Loading) -->
            <script type="text/javascript" src="{!! asset('assets/components/pace/pace.min.js') !!}"></script>

            <!-- App -->
            <script type="text/javascript" src="{!! asset('assets/admin/js/app.js') !!}"></script>

        @show

    </body>
</html>