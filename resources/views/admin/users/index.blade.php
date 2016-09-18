@extends('admin.users.base')

@section('title', trans('admin/users.index.title', ['total' => $users->total()]), @parent)

@section('actions')
	<a href="{{ route('admin.users.create') }}" class="btn dim btn-primary"><i class="fa fa-plus"></i> @lang('admin/_globals.buttons.create')</a>
@endsection

@section('users')

    @section('subtitle', trans('admin/users.index.title', ['total' => $users->total()] ))
    
    <div class="ibox">
        <div class="ibox-content">
            @if ($users->total() > 0)
                <form action="{{ route('admin.users.destroy') }}" method="post">
                    {{ csrf_field() }}
                    <div class="table-responsive">
                        <table class="table table-striped table-align-middle">
                            <thead>
                                <tr>
                                    <th>@sortablelink('id', '#')</th>
                                    <th>@sortablelink('created_at', trans('admin/_globals.tables.created_at'))</th>
                                    <th>@sortablelink('name', trans('admin/_globals.tables.name'))</th>
                                    <th>@sortablelink('email', trans('admin/_globals.tables.email'))</th>
                                    <th>@sortablelink('status', trans('admin/_globals.tables.status'))</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                    <tr>
                                        <td><input type="checkbox" class="i-checks" name="users[]" value="{{ $user->id }}"></td>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->status === 1)
                                                <span class="badge badge-success">@lang('admin/_globals.tables.active')</span>
                                            @elseif ($user->status === 0)
                                                <span class="badge">@lang('admin/_globals.tables.inactive')</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-primary">@lang('admin/_globals.buttons.edit')</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> @lang('admin/_globals.buttons.delete_selected')</button>
                </form>
                {!! $users->render() !!}
            @else
                <div class="widget p-lg text-center">
                    <i class="fa fa-exclamation-triangle fa-2x"></i>
                    <h4 class="no-margins">@lang('admin/users.index.is_empty')</h4>
                </div>
            @endif
        </div>
    </div>

@endsection