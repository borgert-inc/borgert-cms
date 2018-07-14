@extends('blog.base')

@section('content')

    @include('blog/_inc/header')

    @inject('inject', 'App\Http\Controllers\Blog\BlogController')

    @include('blog._inc.alerts')

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-9 col-lg-9">
                @yield('blog')
            </div>

            <div class="col-sm-3 col-md-3 col-lg-3">
                {!! $inject->categorys() !!}
            </div>
        </div>
    </div>

    @include('blog/_inc/footer')

@endsection