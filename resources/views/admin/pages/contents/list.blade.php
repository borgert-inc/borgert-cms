@extends('admin.pages.index')

@section('title', 'Lista de Conteúdos | Páginas ' , @parent)

@section('actions')
	<a href="{{ route('admin.pages.contents.create') }}" class="btn dim btn-primary"><i class="fa fa-plus"></i> Criar Conteúdo</a>
@endsection

@section('pages')
	
	@section('subtitle', 'Lista de conteúdos (' . $contents->total() . ')')

	<div class="ibox">
        <div class="ibox-content">
            @if ($contents->total() > 0)
                <form action="{{ route('admin.pages.contents.destroy') }}" method="post">
                    {{ csrf_field() }}
                    <div class="table-responsive">
                        <table class="table table-striped table-align-middle">
                            <thead>
                                <tr>
                                    <th>@sortablelink('id', '#')</th>
                                    <th>@sortablelink('created_at', 'Criado em')</th>
                                    <th>@sortablelink('category_id', 'Categoria')</th>
                                    <th>@sortablelink('title', 'Título')</th>
                                    <th>@sortablelink('status', 'Status')</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contents as $key => $content)
                                    <tr>
                                        <td><input type="checkbox" class="i-checks" name="contents[]" value="{{ $content->id }}"></td>
                                        <td>{{ date('d M Y | H:i', $content->created_at->timestamp) }}</td>
                                        <td>{{ $content->category->title }}</td>
                                        <td>{{ $content->title }}</td>
                                        <td>
                                            @if ($content->status === 1)
                                                <span class="badge badge-success">Ativo</span>
                                            @elseif ($content->status === 0)
                                                <span class="badge">Inativo</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.pages.contents.edit',$content->id) }}" class="btn btn-primary">Editar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Remover Selecionados</button>
                </form>
                {!! $contents->render() !!}
            @else
                <div class="widget p-lg text-center">
                    <i class="fa fa-exclamation-triangle fa-2x"></i>
                    <h4 class="no-margins">Não existe conteúdos cadastradas.</h4>
                </div>
            @endif
        </div>
    </div>

@endsection