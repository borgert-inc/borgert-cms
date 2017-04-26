@extends('admin.blog.comments.base')

@section('title', trans('admin/blog.comments.aproved.title', ['total' => $comments->total()]), @parent)

@section('comments')
    
    @section('subtitle', trans('admin/blog.comments.aproved.title', ['total' => $comments->total()]))

    <div class="mail-box">

        <div class="mail-body">

            @if ($comments->total() > 0)

                <div class="feed-activity-list">

                    @foreach($comments as $key => $comment)
                        <div class="feed-element">
                            <a href="javascript:;" class="pull-left">
                                <img src="{{ Gravatar::src($comment->email, 60) }}" class="img-circle">
                            </a>
                            <div class="media-body ">
                                @lang('admin/blog.posts.edit.posted',['name' => $comment->name, 'title' => $comment->post->title])
                                <br>
                                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                <div class="well">
                                    {{ $comment->description }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>

                {!! $comments->render() !!}

            @else
                <div class="widget p-lg text-center">
                    <i class="fa fa-exclamation-triangle fa-2x"></i>
                    <h4 class="no-margins">@lang('admin/blog.comments.aproved.is_empty')</h4>
                </div>
            @endif

        </div>

    </div>

@endsection