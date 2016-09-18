@extends('admin.blog.base')

@section('title', trans('admin/blog.posts.index.title', ['total' => $posts->total()]), @parent)

@section('actions')
	<a href="{{ route('admin.blog.posts.create') }}" class="btn dim btn-primary"><i class="fa fa-plus"></i> @lang('admin/_globals.buttons.create')</a>
@endsection

@section('blog')
	
	@section('subtitle', trans('admin/blog.posts.index.title', ['total' => $posts->total()]))

	<div class="ibox">
        <div class="ibox-content">
            @if ($posts->total() > 0)
                <form action="{{ route('admin.blog.posts.destroy') }}" method="post">
                    {{ csrf_field() }}
                    <div class="table-responsive">
                        <table class="table table-striped table-align-middle">
                            <thead>
                                <tr>
                                    <th>@sortablelink('id', '#')</th>
                                    <th>@sortablelink('created_at', trans('admin/_globals.tables.created_at'))</th>
                                    <th>@sortablelink('publish_at', trans('admin/_globals.tables.publish_at'))</th>
                                    <th>@sortablelink('category_id', trans('admin/_globals.tables.category'))</th>
                                    <th>@sortablelink('title', trans('admin/_globals.tables.title'))</th>
                                    <th>@lang('admin/_globals.tables.comments')</th>
                                    <th>@sortablelink('status', trans('admin/_globals.tables.status'))</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $key => $post)
                                    <tr>
                                        <td><input type="checkbox" class="i-checks" name="posts[]" value="{{ $post->id }}"></td>
                                        <td>{{ $post->created_at->diffForHumans() }}</td>
                                        <td>{{ $post->publish_at->diffForHumans() }}</td>
                                        <td>{{ $post->category->title }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->comments->count() }}</td>
                                        <td>
                                            @if ($post->status === 1)
                                                <span class="badge badge-success">@lang('admin/_globals.tables.active')</span>
                                            @elseif ($post->status === 0)
                                                <span class="badge">@lang('admin/_globals.tables.inactive')</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.blog.posts.edit',$post->id) }}" class="btn btn-primary">@lang('admin/_globals.buttons.edit')</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> @lang('admin/_globals.buttons.delete_selected')</button>
                </form>
                {!! $posts->render() !!}
            @else
                <div class="widget p-lg text-center">
                    <i class="fa fa-exclamation-triangle fa-2x"></i>
                    <h4 class="no-margins">@lang('admin/blog.posts.index.is_empty')</h4>
                </div>
            @endif
        </div>
    </div>

@endsection