@extends('admin.mailbox.index')

@section('title', trans('admin/mailbox.trash.title'), @parent)

@section('mailbox')
    
    <h4>@lang('admin/mailbox.trash.title') ({{ $mailbox->total() }})</h4>

    @include('admin/mailbox/_inc/empty',['icone'=>'trash'])

    @include('admin/mailbox/_inc/list')

@endsection