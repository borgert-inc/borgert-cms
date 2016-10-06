@extends('auth.index')

@section('content')

    <div class="middle-box loginscreen animated fadeInDown">

        <h3>@lang('auth.forget.title')</h3>

        <div class="text-left">
            @include('admin._inc.alerts')
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="m-t" role="form" action="{{ route('auth.password.send') }}" method="POST">

            {{ csrf_field() }}

            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="@lang('auth.forget.form.email')" required="">
            </div>

            <button type="submit" class="btn btn-primary block full-width m-b">@lang('auth.forget.form.button')</button>

        </form>

        <p class="text-center">
            <a href="{{ route('auth.login') }}"><small>@lang('auth.forget.back')</small></a>
        </p>

    </div>

@endsection