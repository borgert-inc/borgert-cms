<ul class="metismenu" id="menu">
    <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">@lang('admin/dashboard.module')</span></a></li>
    <li>
        <a href="#"><i class="fa fa-comments"></i> <span class="nav-label">@lang('admin/blog.module')</span> <span class="fa arrow"></span></a>
        <ul class="second-level">
            <li><a href="{{ route('admin.blog.categorys.index') }}">@lang('admin/blog.submodule.categorys')</a></li>
            <li><a href="{{ route('admin.blog.posts.index') }}">@lang('admin/blog.submodule.posts')</a></li>
            <li><a href="{{ route('admin.blog.comments.index') }}">@lang('admin/blog.submodule.comments')</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="fa fa-file-text"></i> <span class="nav-label">@lang('admin/pages.module')</span> <span class="fa arrow"></span></a>
        <ul class="second-level">
            <li><a href="{{ route('admin.pages.categorys.index') }}">@lang('admin/pages.submodule.categorys')</a></li>
            <li><a href="{{ route('admin.pages.contents.index') }}">@lang('admin/pages.submodule.contents')</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="fa fa-cube"></i> <span class="nav-label">@lang('admin/products.module')</span> <span class="fa arrow"></span></a>
        <ul class="second-level">
            <li><a href="{{ route('admin.products.categorys.index') }}">@lang('admin/products.submodule.categorys')</a></li>
            <li><a href="{{ route('admin.products.contents.index') }}">@lang('admin/products.submodule.contents')</a></li>
        </ul>
    </li>
    <li><a href="{{ route('admin.gallerys.index') }}"><i class="fa fa-photo"></i> <span class="nav-label">@lang('admin/gallerys.module')</span></a></li>
    <li><a href="{{ route('admin.mailbox.inbox') }}"><i class="fa fa-envelope"></i> <span class="nav-label">@lang('admin/mailbox.module')</span></a></li>
    <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i> <span class="nav-label">@lang('admin/users.module')</span></a></li>
    <li><a href="{{ route('admin.logs.index') }}"><i class="fa fa-history"></i> <span class="nav-label">@lang('admin/logs.module')</span></a></li>
</ul>