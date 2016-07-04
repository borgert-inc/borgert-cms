@extends('admin.mailbox.index')

@section('title', trans('admin/mailbox.inbox.title') , @parent )

@section('mailbox')
    
    <div class="mail-box-header">

        <h2>@lang('admin/mailbox.inbox.title') ({{ $mailbox->total() }})</h2>

        @include('admin/mailbox/_inc/empty',['icone'=>'inbox'])
        
    </div>
    <div class="mail-box">
        
        @include('admin/mailbox/_inc/list')

    </div>

@endsection