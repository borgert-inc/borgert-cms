@if ($mailbox->total() == 0)
    <div class="text-center">
        <i class="fa fa-{{ $icone }} fa-2x"></i>
        <p>@lang('admin/mailbox.is_empty')</p>
    </div>
@endif