@extends('admin.blog.index')

@section('title', 'Editar post | Blog ', @parent)

@section('actions')
    <a href="{{ route('admin.blog.posts.list') }}" class="btn btn-default"><i class="fa fa-angle-left"></i> Voltar</a>
@endsection

@section('blog')
	
	@section('subtitle', 'Editar post')

    <div class="tabs-container">
        
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-dados"> Dados</a></li>
            <li><a data-toggle="tab" href="#tab-comments"> Comentários ({{ $post->comments->count() }})</a></li>
        </ul>

        <form action="{{ route('admin.blog.posts.update', $post->id) }}" method="post">
            <div class="tab-content">
                
                <div id="tab-dados" class="tab-pane active">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <fieldset class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Categoria:</label>
                                <div class="col-sm-10">
                                    <select name="category_id" class="form-control">
                                        @foreach($categorys as $ky => $category)
                                            <option value="{{ $category->id }}" {{ $post->category_id === $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Título:</label>
                                <div class="col-sm-10"><input type="text" name="title" class="form-control" value="{{ $post->title }}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Conteúdo:</label>
                                <div class="col-sm-10">
                                    <textarea name="content" class="form-control summernote">{{ $post->content }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status:</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control">
                                        <option value="1" {{ $post->status === 1 ? 'selected' : '' }}>Ativo</option>
                                        <option value="0" {{ $post->status === 0 ? 'selected' : '' }}>Inativo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-primary">Salvar</button></div>
                            </div>
                        </fieldset>
                        
                	</div>
                </div>
                
                <div id="tab-comments" class="tab-pane">
                    <div class="panel-body">
                        @if ($post->comments->count() > 0)

                            <div class="feed-activity-list">

                                @foreach($post->comments as $key => $comment)
                                    <div class="feed-element">
                                        <a href="javascript:;" class="pull-left">
                                            <img src="{{ Gravatar::src($comment->email, 60) }}" class="img-circle">
                                        </a>
                                        <div class="media-body ">
                                            <strong>{{ $comment->name }}</strong> postou mensagem em <strong>{{ $comment->post->title }}</strong> no blog. <br>
                                            <small class="text-muted">{{ date('d M Y | H:i', $comment->created_at->timestamp) }}</small>
                                            <div>
                                                {{ $comment->content }}
                                            </div>
                                            @if($comment->status == 0)
                                                <a class="btn btn-sm btn-primary" href="{{ route('admin.blog.comments.aprove', $comment->id) }}"><i class="fa fa-thumbs-up"></i> Aprovar</a>
                                                <a class="btn btn-sm btn-default" href="{{ route('admin.blog.comments.reprove', $comment->id) }}"><i class="fa fa-thumbs-down"></i> Reprovar</a>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                
                            </div>

                        @else
                            <div class="widget p-lg text-center">
                                <i class="fa fa-exclamation-triangle fa-2x"></i>
                                <h4 class="no-margins">Não existe commentário para este post.</h4>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

        </form>

    </div>

@endsection