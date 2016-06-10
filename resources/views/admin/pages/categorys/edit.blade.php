@extends('admin.pages.index')

@section('title', 'Editar categoria | Páginas ', @parent)

@section('actions')
	<a href="{{ route('admin.pages.categorys.list') }}" class="btn btn-default"><i class="fa fa-angle-left"></i> Voltar</a>
@endsection

@section('pages')
	
	@section('subtitle', 'Editar categoria')

	<div class="tabs-container">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-conteudo"> Conteúdo</a></li>
        </ul>

		<form action="{{ route('admin.pages.categorys.update',$category->id) }}" method="post">
            <div class="tab-content">
                <div id="tab-conteudo" class="tab-pane active">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <fieldset class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Categoria:</label>
                                <div class="col-sm-10"><input type="text" name="title" class="form-control" value="{{ $category->title }}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status:</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control">
                                        <option value="1" {{ $category->status === 1 ? 'selected' : '' }}>Ativo</option>
                                        <option value="0" {{ $category->status === 0 ? 'selected' : '' }}>Inativo</option>
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
            </div>
        </form>
        
	</div>

@endsection