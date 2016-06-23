<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Login | Rocket CMS</title>

        <link href="{!! asset('assets/components/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('assets/components/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
        
        <link href="{!! asset('assets/components/animate.css/animate.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('assets/admin/css/app.css') !!}" rel="stylesheet">

    </head>
    <body class="gray-bg">
        
        <div class="middle-box text-center loginscreen animated fadeInDown">
            
            <img src="{{ asset('assets/admin/img/rocket-medium.png') }}" class="img-circle">

            <h3>Bem Vindo ao Rocket CMS</h3>

            <div class="text-left">
                @include('admin._inc.alerts')
            </div>
            
            <form class="m-t" role="form" method="POST" action="{{ route('auth.login') }}">

                {!! csrf_field() !!}

                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="E-mail" required="" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Senha" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="{{ route('auth.forget_password') }}"><small>Esqueceu sua senha?</small></a>
            </form>
            <br>
            <br>
            <p class="m-t"> <small>Rocket CMS &copy; {{ date('Y') }}</small> </p>
            
        </div>

        <!-- Mainly scripts -->
        <script src="{!! asset('assets/components/jquery/dist/jquery.min.js') !!}"></script>
        <script src="{!! asset('assets/components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>

    </body>
</html>