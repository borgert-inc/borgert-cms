@extends('admin.products.index')

@section('title', 'Editar conteúdo | Produtos ' , @parent)

@section('actions')
    <a href="{{ route('admin.products.contents.list') }}" class="btn btn-default"><i class="fa fa-angle-left"></i> Voltar</a>
@endsection

@section('products')
	
	@section('subtitle', 'Editar conteúdo')

	<div class="tabs-container">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-conteudo"> Conteúdo</a></li>
            <li><a data-toggle="tab" href="#tab-seo"> SEO</a></li>
        </ul>

		<form action="{{ route('admin.products.contents.update', $content->id) }}" method="post">
            <div class="tab-content">

                <div id="tab-conteudo" class="tab-pane active">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <fieldset class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Categoria:</label>
                                <div class="col-sm-10">
                                    <select name="category_id" class="form-control">
                                        @foreach($categorys as $ky => $category)
                                            <option value="{{ $category->id }}" {{ $content->category_id === $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Título:</label>
                                <div class="col-sm-10"><input type="text" name="title" class="form-control" value="{{ $content->title }}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Conteúdo:</label>
                                <div class="col-sm-10">
                                    <textarea name="content" class="form-control summernote">{{ $content->content }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status:</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control">
                                        <option value="1" {{ $content->status === 1 ? 'selected' : '' }}>Ativo</option>
                                        <option value="0" {{ $content->status === 0 ? 'selected' : '' }}>Inativo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Salvar</button></div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div id="tab-seo" class="tab-pane">
                    <div class="panel-body">
                        <fieldset class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Título:</label>
                                <div class="col-sm-10">
                                    <input type="text" maxlength="70" name="seo_title" value="{{ $content->seo_title }}" class="form-control">
                                    <div class="text-muted">Permitido até 70 caracteres.</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Descrição:</label>
                                <div class="col-sm-10">
                                    <textarea maxlength="170" name="seo_description" class="form-control">{{ $content->seo_description }}</textarea>
                                    <div class="text-muted">Permitido até 170 caracteres.</div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

            </div>
        </form>

	</div>

@endsection