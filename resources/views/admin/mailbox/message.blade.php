@extends('admin.mailbox.index')

@section('title', 'Mensagem | Mailbox ', @parent)

@section('mailbox')
    
    <div class="mail-box-header">
        <h2>Mensagem</h2>
        <div class="mail-tools tooltip-demo m-t-md">
            <h3><span class="font-noraml">Assunto: </span>{{ $message->subject }}</h3>
            <h5>
                <span class="pull-right font-noraml">{{ $message->created_at }}</span>
                <span class="font-noraml">De: {{ $message->name }} [<a href="mailto:{{ $message->email }}"><u>{{ $message->email }}</u></a>]</span>
            </h5>
        </div>
    </div>
    <div class="mail-box">

        <div class="mail-body">
        
            {!! $message->content !!}

        </div>

        <div class="mail-body" style="overflow: auto;">

            <form action="{{ route('admin.mailbox.delete') }}" method="post" class="pull-right" style="margin-right: 10px;">
                {{ csrf_field() }}
                <input type="hidden" name="messages[]" value="{{ $message->id }}">
                <button class="btn btn-danger btn-sm"><i class="fa fa-remove"></i> Excluir</button>
            </form>

            <form action="{{ route('admin.mailbox.trash_in',$message->id) }}" method="post" class="pull-right" style="margin-right: 10px;">
                {{ csrf_field() }}
                <button class="btn btn-default btn-sm"><i class="fa fa-trash"></i> Enviar para Lixeira</button>
            </form>

            <form action="{{ route('admin.mailbox.archive_in',$message->id) }}" method="post" class="pull-right" style="margin-right: 10px;">
                {{ csrf_field() }}
                <button class="btn btn-default btn-sm"><i class="fa fa-archive"></i> Arquivar Mensagem</button>
            </form>

        </div>

    </div>

    <p>Obs.: As mensagens excluídas não irão aparecer mais em seu Mailbox.</p>

@endsection