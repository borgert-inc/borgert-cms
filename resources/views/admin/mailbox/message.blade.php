@extends('admin.mailbox.index')

@section('title', trans('admin/mailbox.message.title'), @parent)

@section('mailbox')

    <h4>@lang('admin/mailbox.message.title')</h4>
    
    <div class="card">
        <div class="card-header">
            <span class="text-muted">{{ $message->created_at->diffForHumans() }}</span> <br>
            <span class="text-muted">@lang('admin/mailbox.message.from'): {{ $message->name }} [<a href="mailto:{{ $message->email }}"><u>{{ $message->email }}</u></a>]</span> <br>
            <span class="text-muted">@lang('admin/mailbox.message.subject'): </span>{{ $message->subject }} 
        </div>
        <div class="card-body">

            <div class="card-text">
                {!! $message->description !!}
            </div>

            <br>
            
            <div class="clearfix">

                <form action="{{ route('admin.mailbox.delete') }}" method="post" class="pull-right" style="margin-right: 10px;">
                    {{ csrf_field() }}
                    <input type="hidden" name="messages[]" value="{{ $message->id }}">
                    <button class="btn btn-danger"><i class="fa fa-remove"></i> @lang('admin/_globals.buttons.delete')</button>
                </form>

                <form action="{{ route('admin.mailbox.trash_in',$message->id) }}" method="post" class="pull-right" style="margin-right: 10px;">
                    {{ csrf_field() }}
                    <button class="btn btn-default"><i class="fa fa-trash"></i> @lang('admin/_globals.buttons.send_trash')</button>
                </form>

                <form action="{{ route('admin.mailbox.archive_in',$message->id) }}" method="post" class="pull-right" style="margin-right: 10px;">
                    {{ csrf_field() }}
                    <button class="btn btn-default"><i class="fa fa-archive"></i> @lang('admin/_globals.buttons.archive')</button>
                </form>

            </div>

        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item text-muted">@lang('admin/mailbox.message.obs')</li>
        </ul>

    </div>

@endsection