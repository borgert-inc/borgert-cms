
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>404 | Rocket Planet CMS</title>

    <link href="{!! asset('assets/components/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/components/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
    
    <link href="{!! asset('assets/components/animate.css/animate.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/admin/css/rocket-planet.css') !!}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center animated fadeInDown">
        <h1>404</h1>
        <h3 class="font-bold">@lang('error.title')</h3>

        <div class="error-desc">
            @lang('error.description')
        </div>
        <br>    
        <a href="{{ route('admin.index') }}" class="btn btn-primary"> @lang('error.link') </a>
    </div>

    <div class="footer">
        <div class="pull-right">Versão <strong>0.0.1</strong>.</div>
        <div><strong>Rocket Planet CMS</strong> &copy; {{ date('Y') }}</div>
    </div>

    <!-- Mainly scripts -->
    <script src="{!! asset('assets/components/jquery/dist/jquery.min.js') !!}"></script>
    <script src="{!! asset('assets/components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>

</body>

</html>
