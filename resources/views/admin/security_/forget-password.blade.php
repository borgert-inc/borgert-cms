<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Esqueci minha senha | Rocket CMS</title>

        <link href="{!! asset('assets/components/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('assets/components/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
        
        <link href="{!! asset('assets/components/animate.css/animate.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('assets/admin/css/app.css') !!}" rel="stylesheet">

    </head>
    <body class="gray-bg">

        <div class="passwordBox animated fadeInDown">
            <div class="row">

                <div class="col-md-12">
                    <div class="ibox-content">

                        <h2 class="font-bold">Esqueci minha senha</h2>

                        <p>Entre com seu e-mail para receber uma nova senha.</p>

                        <div class="text-left">
                            @include('admin._inc.alerts')
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">

                            <div class="col-lg-12">
                                <form class="m-t" role="form" action="{{ route('auth.password.email') }}" method="POST">

                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="E-mail" required="">
                                    </div>

                                    <button type="submit" class="btn btn-primary block full-width m-b">Enviar nova senha</button>

                                </form>
                            </div>
                        </div>

                        <a href="{{ route('auth.login') }}"><small>Voltar ao Login</small></a>

                    </div>
                </div>
            </div>
            <hr />
            <p class="m-t text-center"> <small>Rocket CMS &copy; {{ date('Y') }}</small> </p>
        </div>

        <!-- Mainly scripts -->
        <script src="{!! asset('assets/components/jquery/dist/jquery.min.js') !!}"></script>
        <script src="{!! asset('assets/components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>

    </body>
</html>