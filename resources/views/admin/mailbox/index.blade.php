@extends('admin.base')

@section('content')
    
    <div class="page-heading">
        <h2>@lang('admin/mailbox.module')</h2>
    </div>
    
    <div class="row">
        <div class="col-lg-3">
            <ul class="list-group">
                <li><a href="{{ route('admin.mailbox.inbox') }}"> <i class="fa fa-inbox "></i> @lang('admin/mailbox.inbox.title')</a></li>
                <li><a href="{{ route('admin.mailbox.archive') }}"> <i class="fa fa-archive"></i> @lang('admin/mailbox.archive.title')</a></li>
                <li><a href="{{ route('admin.mailbox.trash') }}"> <i class="fa fa-trash-o"></i> @lang('admin/mailbox.trash.title')</a></li>
            </ul>
        </div>
        <div class="col-lg-9">
            @yield('mailbox')
        </div>
    </div>

@endsection