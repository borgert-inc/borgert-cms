@extends('admin.base')

@section('content')
    
    <div class="page-heading">
        <h2>@lang('admin/mailbox.module')</h2>
    </div>
    
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-content mailbox-content">
                    <div class="file-manager">
                        <ul class="folder-list m-b-md" style="padding: 0">
                            <li><a href="{{ route('admin.mailbox.inbox') }}"> <i class="fa fa-inbox "></i> @lang('admin/mailbox.inbox.title')</a></li>
                            <li><a href="{{ route('admin.mailbox.archive') }}"> <i class="fa fa-archive"></i> @lang('admin/mailbox.archive.title')</a></li>
                            <li><a href="{{ route('admin.mailbox.trash') }}"> <i class="fa fa-trash-o"></i> @lang('admin/mailbox.trash.title')</a></li>
                        </ul>
                        <h5>@lang('admin/mailbox.legend.title')</h5>
                        <ul class="category-list" style="padding: 0">
                            <li><a href="javascript:;"><i class="fa fa-circle text-navy"></i> @lang('admin/mailbox.legend.types.contact') </a></li>
                            <li><a href="javascript:;"><i class="fa fa-circle text-danger"></i> @lang('admin/mailbox.legend.types.estimate')</a></li>
                            <li><a href="javascript:;"><i class="fa fa-circle text-primary"></i> @lang('admin/mailbox.legend.types.newsletter')</a></li>
                            <li><a href="javascript:;"><i class="fa fa-circle text-info"></i> @lang('admin/mailbox.legend.types.products')</a></li>
                            <li><a href="javascript:;"><i class="fa fa-circle text-warning"></i> @lang('admin/mailbox.legend.types.clients')</a></li>
                        </ul>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 animated fadeIn">
            @yield('mailbox')
        </div>
    </div>

@endsection