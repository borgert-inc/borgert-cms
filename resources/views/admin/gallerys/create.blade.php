@extends('admin.gallerys.index')

@section('title', 'Cadastro de galeria ', @parent)

@section('actions')
    <a href="{{ route('admin.gallerys.list') }}" class="btn btn-default"><i class="fa fa-angle-left"></i> Voltar</a>
@endsection

@section('gallerys')
	
	@section('subtitle', 'Cadastro de galeria')

	<div class="tabs-container">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-conteudo"> Conteúdo</a></li>
            <li><a data-toggle="tab" href="#tab-imagens"> Imagens</a></li>
        </ul>
        
        <form action="{{ route('admin.gallerys.store') }}" class="fileupload" method="post" enctype="multipart/form-data">

            <div class="tab-content">
            
                <div id="tab-conteudo" class="tab-pane active">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <fieldset class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Título:</label>
                                <div class="col-sm-10"><input type="text" name="title" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Conteúdo:</label>
                                <div class="col-sm-10">
                                    <textarea name="content" class="form-control summernote"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status:</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control">
                                        <option value="1">Ativo</option>
                                        <option value="0">Inativo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Criar</button></div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div id="tab-imagens" class="tab-pane">
                    <div class="panel-body">
                        @include('admin._inc.fileupload.buttons')
                    </div>
                </div>

            </div>
        
        </form>

	</div>

@endsection