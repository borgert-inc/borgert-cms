@extends('auth.index')

@section('content')

    <div class="login text-center">
            
        <h5>@lang('auth.login.welcome')</h5>

        <div class="text-left">
            @include('admin._inc.alerts')
        </div>
        
        <form method="POST" action="{{ route('auth.login') }}">

            {!! csrf_field() !!}

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="email" name="email" class="form-control" placeholder="@lang('auth.login.form.email')" required="" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <input type="password" name="password" class="form-control" placeholder="@lang('auth.login.form.senha')" required="">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">@lang('auth.login.form.button')</button>

            <a href="{{ route('auth.password.forgot') }}"><small>@lang('auth.login.forgot')</small></a>
        </form>

        <br>
        
    </div>
    
@endsection
