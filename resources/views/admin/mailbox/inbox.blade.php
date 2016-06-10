@extends('admin.mailbox.index')

@section('title', 'Caixa de Entrada | Mailbox ' , @parent )

@section('mailbox')
    
    <div class="mail-box-header">

        <h2>Caixa de Entrada ({{ $mailbox->total() }})</h2>
        @include('admin/mailbox/_inc/empty',['icone'=>'inbox'])
        
    </div>
    <div class="mail-box">
        
        @include('admin/mailbox/_inc/list')

    </div>

@endsection