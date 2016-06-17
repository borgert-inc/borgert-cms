@extends('admin.blog.index')

@section('title', 'Lista de posts | Blog ', @parent)

@section('actions')
	<a href="{{ route('admin.blog.posts.create') }}" class="btn dim btn-primary"><i class="fa fa-plus"></i> Criar Post</a>
@endsection

@section('blog')
	
	@section('subtitle', 'Lista de posts (' . $posts->total() . ')')

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
                                    <th>@sortablelink('created_at', 'Criado em')</th>
                                    <th>@sortablelink('category_id', 'Categoria')</th>
                                    <th>@sortablelink('title', 'Título')</th>
                                    <th>Comentários</th>
                                    <th>@sortablelink('status', 'Status')</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $key => $post)
                                    <tr>
                                        <td><input type="checkbox" class="i-checks" name="posts[]" value="{{ $post->id }}"></td>
                                        <td>{{ date('d M Y | H:i', $post->created_at->timestamp) }}</td>
                                        <td>{{ $post->category->title }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->comments->count() }}</td>
                                        <td>
                                            @if ($post->status === 1)
                                                <span class="badge badge-success">Ativo</span>
                                            @elseif ($post->status === 0)
                                                <span class="badge">Inativo</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.blog.posts.edit',$post->id) }}" class="btn btn-primary">Editar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Remover Selecionados</button>
                </form>
                {!! $posts->render() !!}
            @else
                <div class="widget p-lg text-center">
                    <i class="fa fa-exclamation-triangle fa-2x"></i>
                    <h4 class="no-margins">Não existe posts cadastradas.</h4>
                </div>
            @endif
        </div>
    </div>

@endsection