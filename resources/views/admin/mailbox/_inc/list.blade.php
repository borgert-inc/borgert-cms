
@if ($mailbox->total() > 0)

    <form action="{{ route('admin.mailbox.delete') }}" method="post">
        {{ csrf_field() }}

        <table class="table table-hover table-mail">
            <tbody>
                @foreach($mailbox as $item)
                <tr class="{{ ($item->open == 0 ? 'unread' : 'red' ) }}"> <!-- read OR unread -->
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks" name="messages[]" value="{{ $item->id }}">
                    </td>
                    <td class="mail-ontact"><a href="{{ route('admin.mailbox.message',$item->id) }}">{{ $item->name }}</a></td>
                    <td class="mail-subject"><a href="{{ route('admin.mailbox.message',$item->id) }}">{{ $item->subject }}</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">{{ $item->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {!! $mailbox->render() !!}

        <div class="mail-body">
            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> @lang('admin/_globals.buttons.delete_selected')</button>
        </div>
    </form>

@endif
