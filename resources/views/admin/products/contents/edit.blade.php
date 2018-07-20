@extends('admin.products.base')

@section('title',  trans('admin/products.contents.edit.title') , @parent)

@section('stylesheet')

    @parent
    
    <!-- Blueimp Jquery File Upload -->
    <link href="{!! asset('assets/components/blueimp-file-upload/css/jquery.fileupload.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/components/blueimp-file-upload/css/jquery.fileupload-ui.css') !!}" rel="stylesheet">

@show

@section('actions')
    <a href="{{ route('admin.products.contents.index') }}" class="btn btn-default"><i class="fa fa-angle-left"></i> @lang('admin/_globals.buttons.back')</a>
@endsection

@section('products')
	
	@section('subtitle',  trans('admin/products.contents.edit.title'))

	<div class="tabs-container">

        <ul class="nav nav-tabs">
            <li><a class="nav-link active" data-toggle="tab" href="#tab-contents"> @lang('admin/_globals.forms.nav.contents')</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#tab-images"> @lang('admin/_globals.forms.nav.images')</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#tab-data"> @lang('admin/_globals.forms.nav.data')</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#tab-seo"> @lang('admin/_globals.forms.nav.seo')</a></li>
        </ul>

		<form action="{{ route('admin.products.contents.update',$content->id) }}" class="fileupload" method="post" enctype="multipart/form-data">
            <div class="tab-content">

                <div id="tab-contents" class="tab-pane active">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.category'):</label>
                            <select name="category_id" class="form-control">
                                @foreach($categorys as $ky => $category)
                                    <option value="{{ $category->id }}" {{ $content->category_id === $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.title'):</label>
                            <input type="text" name="title" class="form-control" value="{{ $content->title }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.content'):</label>
                            <textarea name="description" class="form-control summernote">{{ $content->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.status'):</label>
                            <input type="checkbox" name="status" class="js-switch" value="1" {{ $content->status === 1 ? 'checked' : '' }} />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('admin/_globals.buttons.save')</button>
                        </div>
                    </div>
                </div>

                <div id="tab-images" class="tab-pane">
                    <div class="panel-body">
                        @include('admin._inc.fileupload.buttons',['extensions' => ['GIF', 'JPG', 'JPEG', 'PNG']])
                    </div>
                </div>

                <div id="tab-data" class="tab-pane">
                    <div class="panel-body">
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.code'):</label>
                            <input type="text" name="code" class="form-control" value="{{ $content->code }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.price'):</label>
                            <input type="number" step="0.01" min="0" name="price" class="form-control" value="{{ $content->price }}">
                            <label>@lang('admin/_globals.forms.price_per'):</label>
                            <input type="number" step="0.01" min="0" name="price_per" class="form-control" value="{{ $content->price_per }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.information_technical'):</label>
                            <textarea name="information_technical" class="form-control summernote">{{ $content->information_technical }}</textarea>
                        </div>
                    </div>
                </div>

                <div id="tab-seo" class="tab-pane">
                    <div class="panel-body">
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.title'):</label>
                            <input type="text" maxlength="70" name="seo_title" value="{{ $content->seo_title }}" class="form-control">
                            <div class="text-muted">@lang('admin/_globals.forms.limit_characters',['limit' => 70])</div>
                        </div>
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.description'):</label>
                            <textarea maxlength="170" name="seo_description" class="form-control">{{ $content->seo_description }}</textarea>
                            <div class="text-muted">@lang('admin/_globals.forms.limit_characters',['limit' => 170])</div>
                        </div>
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.keywords'):</label>
                            <textarea name="seo_keywords" class="form-control">{{ $content->seo_keywords }}</textarea>
                        </div>
                    </div>
                </div>

            </div>
        </form>

	</div>

@endsection

@section('javascript')

    @parent

    @include('admin._inc.fileupload.upload')
    @include('admin._inc.fileupload.download')

    <!-- Blueimp Jquery File Upload -->
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/vendor/jquery.ui.widget.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-tmpl/js/tmpl.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-load-image/js/load-image.all.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-canvas-to-blob/js/canvas-to-blob.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.iframe-transport.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-process.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-image.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-audio.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-video.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-validate.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-ui.js') !!}"></script>

    <script type="text/javascript">
        
        // Initialize the jQuery File Upload widget:
        $('.fileupload').fileupload({
            autoUpload: true,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png|bmp)$/i,
            maxFileSize: 10240000, // 10 MB
            url: '{{ route('admin.products.contents.upload',$content->id) }}' ,
        });

         // Load existing files:
        $('.fileupload').addClass('fileupload-processing');

        $.ajax({
            url: $('.fileupload').fileupload('option', 'url'),
            dataType: 'json',
            context: $('.fileupload')[0]
        }).always(function () {
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {
            $(this).fileupload('option', 'done').call(this, $.Event('done'), {result: result});
        });

    </script>

@stop