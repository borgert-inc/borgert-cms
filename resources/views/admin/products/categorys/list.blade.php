@extends('admin.products.index')

@section('title', 'Lista de categorias | Produtos ', @parent)

@section('actions')
	<a href="{{ route('admin.products.categorys.create') }}" class="btn dim btn-primary"><i class="fa fa-plus"></i> Criar Categoria</a>
@endsection

@section('products')
	
	@section('subtitle', 'Lista de categorias (' . $categorys->total() . ')')

	<div class="ibox">
        <div class="ibox-content">
            @if ($categorys->total() > 0)
                <form action="{{ route('admin.products.categorys.destroy') }}" method="post">
                    {{ csrf_field() }}
                    <div class="table-responsive">
                        <table class="table table-striped table-align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Criado em</th>
                                    <th>Título</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categorys as $key => $category)
                                    <tr>
                                        <td><input type="checkbox" class="i-checks" name="categorys[]" value="{{ $category->id }}"></td>
                                        <td>{{ date('d M Y | H:i', $category->created_at->timestamp) }}</td>
                                        <td>{{ $category->title }}</td>
                                        <td>
                                            @if ($category->status === 1)
                                                <span class="badge badge-success">Ativo</span>
                                            @elseif ($category->status === 0)
                                                <span class="badge">Inativo</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.products.categorys.edit',$category->id) }}" class="btn btn-primary">Editar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Remover Selecionados</button>
                </form>
                {!! $categorys->render() !!}
            @else
                <div class="widget p-lg text-center">
                    <i class="fa fa-exclamation-triangle fa-2x"></i>
                    <h4 class="no-margins">Não existe categorias cadastradas.</h4>
                </div>
            @endif
        </div>
    </div>

@endsection