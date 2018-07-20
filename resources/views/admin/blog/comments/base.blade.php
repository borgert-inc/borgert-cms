@extends('admin.blog.base')

@section('blog')

    <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
            <ul class="list-group list-group-small">
                <a href="{{ route('admin.blog.comments.index') }}" class="list-group-item list-group-item-action"> <i class="fa fa-circle text-navy"></i> @lang('admin/blog.comments.types.pending')</a>
                <a href="{{ route('admin.blog.comments.aproved') }}" class="list-group-item list-group-item-action"> <i class="fa fa-circle text-primary"></i> @lang('admin/blog.comments.types.approved')</a>
                <a href="{{ route('admin.blog.comments.reproved') }}" class="list-group-item list-group-item-action"> <i class="fa fa-circle text-danger"></i> @lang('admin/blog.comments.types.reproved')</a>
            </ul>
        </div>
        <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9">
            @yield('comments')
        </div>
    </div>

@endsection