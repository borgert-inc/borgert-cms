<div class="sidebard-panel">
    <div class="m-t-md">
        <h4>@lang('admin/dashboard.blog.title')</h4>
        <div class="media-body">
            @lang('admin/dashboard.blog.description')
        </div>
    </div>
    <div class="m-t-md">
        <h4>@lang('admin/dashboard.pages.title')</h4>
        <div class="media-body">
            @lang('admin/dashboard.pages.description')
        </div>
    </div>
    <div class="m-t-md">
        <h4>@lang('admin/dashboard.mailbox.title')</h4>
        <div>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge badge-primary">{{ $inbox->count() }}</span>
                    <a href="{{ route('admin.mailbox.inbox') }}"><u>@lang('admin/dashboard.mailbox.inbox')</u></a>
                </li>
                <li class="list-group-item">
                    <span class="badge badge-success">{{ $archive->count() }}</span>
                    <a href="{{ route('admin.mailbox.archive') }}"><u>@lang('admin/dashboard.mailbox.archive')</u></a>
                </li>
                <li class="list-group-item">
                    <span class="badge badge-warning">{{ $trash->count() }}</span>
                    <a href="{{ route('admin.mailbox.trash') }}"><u>@lang('admin/dashboard.mailbox.trash')</u></a>
                </li>
            </ul>
        </div>
    </div>
</div>