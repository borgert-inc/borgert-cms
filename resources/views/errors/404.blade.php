
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>404 | {{ config('borgert.name') }}</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400" rel="stylesheet"> 

    <!-- Bootstrap -->
    <link href="{!! asset('assets/components/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="{!! asset('assets/components/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">

    <!-- Style Error -->
    <link href="{!! asset('assets/errors/css/all.css') !!}" rel="stylesheet">

</head>

<body>

    <div class="container text-center">
        <h1>404</h1>
        <h3>@lang('error.404.title')</h3>
        <div>@lang('error.404.description')</div>
        <br>    
        <a href="{{ route('admin.index') }}" class="btn btn-primary">@lang('error.404.link')</a>
        <div class="footer">
            <div class="pull-right"><strong>{{ config('borgert.version') }}</strong>.</div>
            <div><strong>{{ config('borgert.name') }}</strong> &copy; {{ date('Y') }}</div>
        </div>
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="{!! asset('assets/errors/js/all.js') !!}"></script>

</body>

</html>
