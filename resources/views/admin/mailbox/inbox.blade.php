@extends('admin.mailbox.index')

@section('title', trans('admin/mailbox.inbox.title') , @parent )

@section('mailbox')
    
    <h4>@lang('admin/mailbox.inbox.title') ({{ $mailbox->total() }})</h4>

    @include('admin/mailbox/_inc/empty',['icone'=>'inbox'])
        
    @include('admin/mailbox/_inc/list')

@endsection