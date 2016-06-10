@extends('admin.mailbox.index')

@section('title', 'Lixeira | Mailbox ', @parent)

@section('mailbox')
    
    <div class="mail-box-header">

        <h2>Lixeira ({{ $mailbox->total() }})</h2>
        @include('admin/mailbox/_inc/empty',['icone'=>'trash'])

    </div>
    <div class="mail-box">

        @include('admin/mailbox/_inc/list')

    </div>

@endsection