@extends('admin.blog.base')

@section('blog')
	
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-content mailbox-content">
                    <div class="file-manager">
                        <h5>Filtros</h5>
                        <ul class="category-list folder-list" style="padding: 0">
                            <li><a href="{{ route('admin.blog.comments.index') }}"> <i class="fa fa-circle text-navy"></i> @lang('admin/blog.comments.types.pending')</a></li>
                            <li><a href="{{ route('admin.blog.comments.aproved') }}"> <i class="fa fa-circle text-primary"></i> @lang('admin/blog.comments.types.approved')</a></li>
                            <li><a href="{{ route('admin.blog.comments.reproved') }}"> <i class="fa fa-circle text-danger"></i> @lang('admin/blog.comments.types.reproved')</a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 animated fadeIn">
            @yield('comments')
        </div>
    </div>

@endsection