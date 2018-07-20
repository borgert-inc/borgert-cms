
@if ($mailbox->total() > 0)

    <form action="{{ route('admin.mailbox.delete') }}" method="post">

        {{ csrf_field() }}

        <table class="table table-striped table-align-middle">
            <tbody>
                @foreach($mailbox as $item)
                <tr class="{{ ($item->open == 0 ? 'table-info' : '' ) }}"> <!-- read OR unread -->
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks" name="messages[]" value="{{ $item->id }}">
                    </td>
                    <td><a href="{{ route('admin.mailbox.message',$item->id) }}">{{ $item->name }}</a></td>
                    <td><a href="{{ route('admin.mailbox.message',$item->id) }}">{{ $item->subject }}</a></td>
                    <td></td>
                    <td class="text-right text-muted">{{ $item->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {!! $mailbox->render() !!}

        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> @lang('admin/_globals.buttons.delete_selected')</button>

    </form>

@endif
