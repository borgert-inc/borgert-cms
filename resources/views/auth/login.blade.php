@extends('auth.index')

@section('content')

    <div class="middle-box text-center loginscreen animated fadeInDown">
            
        <h3>Bem Vindo ao Rocket CMS</h3>

        <div class="text-left">
            @include('admin._inc.alerts')
        </div>
        
        <form class="m-t" role="form" method="POST" action="{{ route('auth.login') }}">

            {!! csrf_field() !!}

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="email" name="email" class="form-control" placeholder="E-mail" required="" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <input type="password" name="password" class="form-control" placeholder="Senha" required="">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            
            <!-- <div class="form-group">
                <input type="checkbox" name="remember"> Lembre-me da senha
            </div> -->

            <a href="{{ route('auth.forget_password') }}"><small>Esqueceu sua senha?</small></a>
        </form>

        <br>
        
    </div>
    
@endsection
