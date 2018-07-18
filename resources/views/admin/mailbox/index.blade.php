@extends('admin.base')

@section('content')
    
    <div class="page-heading">
        <h2>@lang('admin/mailbox.module')</h2>
    </div>
    
    <div class="row">
        <div class="col-lg-3 col-sm-3 col-md-3">
            <ul class="list-group">
                <a href="{{ route('admin.mailbox.inbox') }}" class="list-group-item list-group-item-action"> <i class="fa fa-inbox "></i> @lang('admin/mailbox.inbox.title')</a>
                <a href="{{ route('admin.mailbox.archive') }}" class="list-group-item list-group-item-action"> <i class="fa fa-archive"></i> @lang('admin/mailbox.archive.title')</a>
                <a href="{{ route('admin.mailbox.trash') }}" class="list-group-item list-group-item-action"> <i class="fa fa-trash-o"></i> @lang('admin/mailbox.trash.title')</a>
            </ul>
        </div>
        <div class="col-lg-9 col-sm-9 col-md-9">
            @yield('mailbox')
        </div>
    </div>

@endsection