@extends('admin.mailbox.index')

@section('title', 'Arquivados | Mailbox ', @parent)

@section('mailbox')
    
    <div class="mail-box-header">

        <h2>Arquivados ({{ $mailbox->total() }})</h2>
        @include('admin/mailbox/_inc/empty',['icone'=>'archive'])

    </div>
    <div class="mail-box">

        @include('admin/mailbox/_inc/list')

    </div>

@endsection