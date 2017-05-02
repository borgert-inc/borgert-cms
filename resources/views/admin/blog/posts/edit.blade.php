@extends('admin.blog.base')

@section('title',  trans('admin/blog.posts.edit.title'), @parent)

@section('stylesheet')

    @parent
    
    <!-- Blueimp Jquery File Upload -->
    <link href="{!! asset('assets/components/blueimp-file-upload/css/jquery.fileupload.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/components/blueimp-file-upload/css/jquery.fileupload-ui.css') !!}" rel="stylesheet">

@show

@section('actions')
    <a href="{{ route('admin.blog.posts.index') }}" class="btn btn-default"><i class="fa fa-angle-left"></i> @lang('admin/_globals.buttons.back')</a>
@endsection

@section('blog')
	
	@section('subtitle',  trans('admin/blog.posts.edit.title'))

    <div class="tabs-container">
        
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-contents"> @lang('admin/_globals.forms.nav.contents')</a></li>
            <li><a data-toggle="tab" href="#tab-images"> @lang('admin/_globals.forms.nav.images')</a></li>
            <li><a data-toggle="tab" href="#tab-seo"> @lang('admin/_globals.forms.nav.seo')</a></li>
            <li><a data-toggle="tab" href="#tab-comments"> @lang('admin/_globals.forms.nav.comments') ({{ $post->comments->count() }})</a></li>
        </ul>

        <form action="{{ route('admin.blog.posts.update', $post->id) }}" class="fileupload" method="post" enctype="multipart/form-data">
            <div class="tab-content">
                
                <div id="tab-contents" class="tab-pane active">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <fieldset class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.publish_at'):</label>
                                <div class="col-sm-10"><input type="text" name="publish_at" class="form-control datetimepicker" value="{{ $post->publish_at }}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.category'):</label>
                                <div class="col-sm-10">
                                    <select name="category_id" class="form-control">
                                        @foreach($categorys as $ky => $category)
                                            <option value="{{ $category->id }}" {{ $post->category_id === $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.title'):</label>
                                <div class="col-sm-10"><input type="text" name="title" class="form-control" value="{{ $post->title }}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.content'):</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control summernote">{{ $post->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.status'):</label>
                                <div class="col-sm-10">
                                    <input type="checkbox" name="status" class="js-switch" value="1" {{ $post->status === 1 ? 'checked' : '' }} />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('admin/_globals.buttons.save')</button></div>
                            </div>
                        </fieldset>
                        
                	</div>
                </div>

                <div id="tab-images" class="tab-pane">
                    <div class="panel-body">
                        @include('admin._inc.fileupload.buttons',['extensions' => ['GIF', 'JPG', 'JPEG', 'PNG']])
                    </div>
                </div>

                <div id="tab-seo" class="tab-pane">
                    <div class="panel-body">
                        <fieldset class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.title'):</label>
                                <div class="col-sm-10">
                                    <input type="text" maxlength="70" name="seo_title" value="{{ $post->seo_title }}" class="form-control">
                                    <div class="text-muted">@lang('admin/_globals.forms.limit_characters',['limit' => 70])</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.description'):</label>
                                <div class="col-sm-10">
                                    <textarea maxlength="170" name="seo_description" class="form-control">{{ $post->seo_description }}</textarea>
                                    <div class="text-muted">@lang('admin/_globals.forms.limit_characters',['limit' => 170])</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.keywords'):</label>
                                <div class="col-sm-10">
                                    <textarea name="seo_keywords" class="form-control">{{ $post->seo_keywords }}</textarea>
                                </div>
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
                                            @lang('admin/blog.posts.edit.posted',['name' => $comment->name, 'title' => $comment->post->title]) <br>
                                            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                            <div>
                                                {{ $comment->content }}
                                            </div>
                                            @if($comment->status == 0)
                                                <a class="btn btn-sm btn-primary" href="{{ route('admin.blog.comments.aprove', $comment->id) }}"><i class="fa fa-thumbs-up"></i> @lang('admin/_globals.buttons.aprove')</a>
                                                <a class="btn btn-sm btn-default" href="{{ route('admin.blog.comments.reprove', $comment->id) }}"><i class="fa fa-thumbs-down"></i> @lang('admin/_globals.buttons.reprove')</a>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                
                            </div>

                        @else
                            <div class="widget p-lg text-center">
                                <i class="fa fa-exclamation-triangle fa-2x"></i>
                                <h4 class="no-margins">@lang('admin/blog.comments.is_empty')</h4>
                            </div>
                        @endif
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
            url: '{{ route('admin.blog.posts.upload',$post->id) }}' ,
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