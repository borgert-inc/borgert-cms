@extends('admin.mailbox.index')

@section('title', trans('admin/mailbox.message.title'), @parent)

@section('mailbox')
    
    <div class="mail-box-header">
        <h2>@lang('admin/mailbox.message.title')</h2>
        <div class="mail-tools tooltip-demo m-t-md">
            <h3><span class="font-noraml">@lang('admin/mailbox.message.subject'): </span>{{ $message->subject }}</h3>
            <h5>
                <span class="pull-right font-noraml">{{ $message->created_at->diffForHumans() }}</span>
                <span class="font-noraml">@lang('admin/mailbox.message.from'): {{ $message->name }} [<a href="mailto:{{ $message->email }}"><u>{{ $message->email }}</u></a>]</span>
            </h5>
        </div>
    </div>
    <div class="mail-box">

        <div class="mail-body">
        
            {!! $message->description !!}

        </div>

        <div class="mail-body" style="overflow: auto;">

            <form action="{{ route('admin.mailbox.delete') }}" method="post" class="pull-right" style="margin-right: 10px;">
                {{ csrf_field() }}
                <input type="hidden" name="messages[]" value="{{ $message->id }}">
                <button class="btn btn-danger btn-sm"><i class="fa fa-remove"></i> @lang('admin/_globals.buttons.delete')</button>
            </form>

            <form action="{{ route('admin.mailbox.trash_in',$message->id) }}" method="post" class="pull-right" style="margin-right: 10px;">
                {{ csrf_field() }}
                <button class="btn btn-default btn-sm"><i class="fa fa-trash"></i> @lang('admin/_globals.buttons.send_trash')</button>
            </form>

            <form action="{{ route('admin.mailbox.archive_in',$message->id) }}" method="post" class="pull-right" style="margin-right: 10px;">
                {{ csrf_field() }}
                <button class="btn btn-default btn-sm"><i class="fa fa-archive"></i> @lang('admin/_globals.buttons.archive')</button>
            </form>

        </div>

    </div>

    <p>@lang('admin/mailbox.message.obs')</p>

@endsection