@extends('admin.mailbox.index')

@section('title', trans('admin/mailbox.archive.title'), @parent)

@section('mailbox')
    
    <h4>@lang('admin/mailbox.archive.title') ({{ $mailbox->total() }})</h4>
    
    @include('admin/mailbox/_inc/empty',['icone'=>'archive'])

    @include('admin/mailbox/_inc/list')

@endsection