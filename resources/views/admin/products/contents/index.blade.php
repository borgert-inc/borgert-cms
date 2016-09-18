@extends('admin.products.base')

@section('title', trans('admin/products.contents.index.title', ['total' => $contents->total()]) , @parent)

@section('actions')
	<a href="{{ route('admin.products.contents.create') }}" class="btn dim btn-primary"><i class="fa fa-plus"></i> @lang('admin/_globals.buttons.create')</a>
@endsection

@section('products')
	
	@section('subtitle', trans('admin/products.contents.index.title', ['total' => $contents->total()]))

	<div class="ibox">
        <div class="ibox-content">
            @if ($contents->total() > 0)
                <form action="{{ route('admin.products.contents.destroy') }}" method="post">
                    {{ csrf_field() }}
                    <div class="table-responsive">
                        <table class="table table-striped table-align-middle">
                            <thead>
                                <tr>
                                    <th>@sortablelink('id', '#')</th>
                                    <th>@sortablelink('created_at', trans('admin/_globals.tables.created_at'))</th>
                                    <th>@sortablelink('category_id', trans('admin/_globals.tables.category'))</th>
                                    <th>@sortablelink('title', trans('admin/_globals.tables.title'))</th>
                                    <th>@sortablelink('status', trans('admin/_globals.tables.status'))</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contents as $key => $content)
                                    <tr>
                                        <td><input type="checkbox" class="i-checks" name="contents[]" value="{{ $content->id }}"></td>
                                        <td>{{ $content->created_at->diffForHumans() }}</td>
                                        <td>{{ $content->category->title }}</td>
                                        <td>{{ $content->title }}</td>
                                        <td>
                                            @if ($content->status === 1)
                                                <span class="badge badge-success">@lang('admin/_globals.tables.active')</span>
                                            @elseif ($content->status === 0)
                                                <span class="badge">@lang('admin/_globals.tables.inactive')</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.products.contents.edit',$content->id) }}" class="btn btn-primary">@lang('admin/_globals.buttons.edit')</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> @lang('admin/_globals.buttons.delete_selected')</button>
                </form>
                {!! $contents->render() !!}
            @else
                <div class="widget p-lg text-center">
                    <i class="fa fa-exclamation-triangle fa-2x"></i>
                    <h4 class="no-margins">@lang('admin/products.contents.index.is_empty')</h4>
                </div>
            @endif
        </div>
    </div>

@endsection