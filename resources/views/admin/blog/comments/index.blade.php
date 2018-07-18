@extends('admin.blog.comments.base')

@section('title', trans('admin/blog.comments.index.title', ['total' => $comments->total()]), @parent)

@section('comments')
    
    @section('subtitle', trans('admin/blog.comments.index.title', ['total' => $comments->total()]))

    @if ($comments->total() > 0)

        @foreach($comments as $key => $comment)
            <div>
                <a href="javascript:;" class="pull-left mr-2">
                    <img src="{{ Gravatar::src($comment->email, 60) }}" class="rounded-circle">
                </a>
                <div>
                    @lang('admin/blog.posts.edit.posted',['name' => $comment->name, 'title' => $comment->post->title]) <br>
                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    <div>
                        {{ $comment->description }}
                    </div>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.blog.comments.aprove', $comment->id) }}"><i class="fa fa-thumbs-up"></i> @lang('admin/_globals.buttons.aprove')</a>
                    <a class="btn btn-sm btn-default" href="{{ route('admin.blog.comments.reprove', $comment->id) }}"><i class="fa fa-thumbs-down"></i> @lang('admin/_globals.buttons.reprove')</a>
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
        @endforeach

        {!! $comments->render() !!}

    @else
        <div class="text-center">
            <i class="fa fa-exclamation-triangle fa-2x"></i>
            <p>@lang('admin/blog.comments.index.is_empty')</p>
        </div>
    @endif

@endsection