@extends('admin.gallerys.index')

@section('title', 'Lista de galerias ', @parent)

@section('actions')
	<a href="{{ route('admin.gallerys.create') }}" class="btn dim btn-primary"><i class="fa fa-plus"></i> Criar Galeria</a>
@endsection

@section('gallerys')
	
	@section('subtitle', 'Lista de galerias (' . $gallerys->total() . ')')

	<div class="ibox">
        <div class="ibox-content">
            @if ($gallerys->total() > 0)
                <form action="{{ route('admin.gallerys.destroy') }}" method="post">
                    {{ csrf_field() }}
                    <div class="table-responsive">
                        <table class="table table-striped table-align-middle">
                            <thead>
                                <tr>
                                    <th>@sortablelink('id', '#')</th>
                                    <th>@sortablelink('created_at', 'Criado em')</th>
                                    <th>@sortablelink('title', 'Título')</th>
                                    <th>@sortablelink('status', 'Status')</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gallerys as $key => $gallery)
                                    <tr>
                                        <td><input type="checkbox" class="i-checks" name="gallerys[]" value="{{ $gallery->id }}"></td>
                                        <td>{{ date('d M Y | H:i', $gallery->created_at->timestamp) }}</td>
                                        <td>{{ $gallery->title }}</td>
                                        <td>
                                            @if ($gallery->status === 1)
                                                <span class="badge badge-success">Ativo</span>
                                            @elseif ($gallery->status === 0)
                                                <span class="badge">Inativo</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.gallerys.edit',$gallery->id) }}" class="btn btn-primary">Editar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Remover Selecionados</button>
                </form>
                {!! $gallerys->render() !!}
            @else
                <div class="widget p-lg text-center">
                    <i class="fa fa-exclamation-triangle fa-2x"></i>
                    <h4 class="no-margins">Não existe galerias cadastradas.</h4>
                </div>
            @endif
        </div>
    </div>

@endsection