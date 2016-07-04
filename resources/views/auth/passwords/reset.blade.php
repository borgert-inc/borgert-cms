@extends('auth.index')

@section('content')


    <div class="middle-box loginscreen animated fadeInDown">

        <h3>@lang('auth.reset.title')</h3>

        <form class="m-t" role="form" method="POST" action="{{ route('auth.password.reset') }}">
            
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">
            
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="@lang('auth.reset.form.email')">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" name="password" placeholder="@lang('auth.reset.form.password_confirmation')">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input type="password" class="form-control" name="password_confirmation" placeholder="@lang('auth.reset.form.password_confirmation')">
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary block full-width"><i class="fa fa-btn fa-refresh"></i> @lang('auth.reset.form.button')</button>

        </form>

    </div>

@endsection
