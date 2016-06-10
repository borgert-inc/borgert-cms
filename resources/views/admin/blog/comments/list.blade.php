@extends('admin.blog.comments.index')

@section('title', 'Lista de comentários pendentes | Blog ', @parent)

@section('comments')
    
    @section('subtitle', 'Lista de comentários pendentes (' . $comments->total() . ')')

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
                                <strong>{{ $comment->name }}</strong> postou mensagem em <strong>{{ $comment->post->title }}</strong> no blog. <br>
                                <small class="text-muted">{{ date('d M Y | H:i', $comment->created_at->timestamp) }}</small>
                                <div class="well">
                                    {{ $comment->content }}
                                </div>
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.blog.comments.aprove', $comment->id) }}"><i class="fa fa-thumbs-up"></i> Aprovar</a>
                                <a class="btn btn-sm btn-default" href="{{ route('admin.blog.comments.reprove', $comment->id) }}"><i class="fa fa-thumbs-down"></i> Reprovar</a>
                            </div>
                        </div>
                    @endforeach
                    
                </div>

                {!! $comments->render() !!}

            @else
                <div class="widget p-lg text-center">
                    <i class="fa fa-exclamation-triangle fa-2x"></i>
                    <h4 class="no-margins">Não existe commentários pendentes.</h4>
                </div>
            @endif

        </div>

    </div>

@endsection