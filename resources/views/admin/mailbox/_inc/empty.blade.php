@if ($mailbox->total() == 0)
    <div class="widget p-lg text-center">
        <div class="m-b-md">
            <i class="fa fa-{{ $icone }} fa-2x"></i>
            <p>@lang('admin/mailbox.is_empty')</p>
        </div>
    </div>
@endif