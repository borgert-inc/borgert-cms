@extends('admin.pages.base')

@section('title', trans('admin/pages.categorys.index.title', ['total' => $categorys->total()]), @parent)

@section('actions')
	<a href="{{ route('admin.pages.categorys.create') }}" class="btn dim btn-primary"><i class="fa fa-plus"></i> @lang('admin/_globals.buttons.create')</a>
@endsection

@section('pages')
	
	@section('subtitle', trans('admin/pages.categorys.index.title', ['total' => $categorys->total()]))

	<div class="ibox">
        <div class="ibox-content">
            @if ($categorys->total() > 0)
                <form action="{{ route('admin.pages.categorys.destroy') }}" method="post">
                    {{ csrf_field() }}
                    <div class="table-responsive">
                        <table class="table table-striped table-align-middle">
                            <thead>
                                <tr>
                                    <th>@sortablelink('id', '#')</th>
                                    <th>@sortablelink('created_at', trans('admin/_globals.tables.created_at'))</th>
                                    <th>@sortablelink('title', trans('admin/_globals.tables.title'))</th>
                                    <th>@sortablelink('order', trans('admin/_globals.tables.order'))</th>
                                    <th>@sortablelink('status', trans('admin/_globals.tables.status'))</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categorys as $key => $category)
                                    <tr>
                                        <td><input type="checkbox" class="i-checks" name="categorys[]" value="{{ $category->id }}"></td>
                                        <td>{{ $category->created_at->diffForHumans() }}</td>
                                        <td>{{ $category->title }}</td>
                                        <td>{{ $category->order }}</td>
                                        <td>
                                            @if ($category->status === 1)
                                                <span class="badge badge-success">@lang('admin/_globals.tables.active')</span>
                                            @elseif ($category->status === 0)
                                                <span class="badge">@lang('admin/_globals.tables.inactive')</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.pages.categorys.edit',$category->id) }}" class="btn btn-primary">@lang('admin/_globals.buttons.edit')</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> @lang('admin/_globals.buttons.delete_selected')</button>
                </form>
                {!! $categorys->render() !!}
            @else
                <div class="widget p-lg text-center">
                    <i class="fa fa-exclamation-triangle fa-2x"></i>
                    <h4 class="no-margins">@lang('admin/pages.categorys.index.is_empty')</h4>
                </div>
            @endif
        </div>
    </div>

@endsection