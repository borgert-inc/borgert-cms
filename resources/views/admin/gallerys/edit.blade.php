@extends('admin.gallerys.index')

@section('title', 'Editar galeria ', @parent)

@section('actions')
	<a href="{{ route('admin.gallerys.list') }}" class="btn btn-default"><i class="fa fa-angle-left"></i> Voltar</a>
@endsection

@section('gallerys')
	
	@section('subtitle', 'Editar galeria')

    @foreach($images as $id)
        {{ $id }} <br>
    @endforeach

    <div class="tabs-container">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-conteudo"> Conteúdo</a></li>
            <li><a data-toggle="tab" href="#tab-imagens"> Imagens</a></li>
        </ul>


		<form action="{{ route('admin.gallerys.update',$gallery->id) }}" class="fileupload" method="post" enctype="multipart/form-data">
            <div class="tab-content">

                <div id="tab-conteudo" class="tab-pane active">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <fieldset class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Título:</label>
                                <div class="col-sm-10"><input type="text" name="title" class="form-control" value="{{ $gallery->title }}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Conteúdo:</label>
                                <div class="col-sm-10">
                                    <textarea name="content" class="form-control summernote">{{ $gallery->content }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status:</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control">
                                        <option value="1" {{ $gallery->status === 1 ? 'selected' : '' }}>Ativo</option>
                                        <option value="0" {{ $gallery->status === 0 ? 'selected' : '' }}>Inativo</option>
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

                <div id="tab-imagens" class="tab-pane">
                    <div class="panel-body">
                        @include('admin._inc.fileupload.buttons')
                    </div>
                </div>

            </div>
        </form>
        
	</div>

@endsection