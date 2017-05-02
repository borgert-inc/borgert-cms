@extends('admin.pages.base')

@section('title',  trans('admin/pages.contents.create.title'), @parent)

@section('actions')
    <a href="{{ route('admin.pages.contents.index') }}" class="btn btn-default"><i class="fa fa-angle-left"></i> @lang('admin/_globals.buttons.back')</a>
@endsection

@section('pages')
	
	@section('subtitle',  trans('admin/pages.contents.create.title'))

	<div class="tabs-container">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-contents"> @lang('admin/_globals.forms.nav.contents')</a></li>
            <li><a data-toggle="tab" href="#tab-seo"> SEO</a></li>
        </ul>

		<form action="{{ route('admin.pages.contents.store') }}" method="post">
            <div class="tab-content">

                <div id="tab-contents" class="tab-pane active">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <fieldset class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.category'):</label>
                                <div class="col-sm-10">
                                    @if ($categorys->count() > 0)
                                        <select name="category_id" class="form-control">
                                            @foreach($categorys as $ky => $category)
                                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    @else 
                                        <a href="{{ route('admin.pages.categorys.create') }}" class="btn dim btn-primary"><i class="fa fa-plus"></i> @lang('admin/_globals.buttons.create')</a> <span class="text-inline"> @lang('admin/pages.categorys.index.is_empty')</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.title'):</label>
                                <div class="col-sm-10"><input type="text" name="title" class="form-control" value="{{ old('title') }}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.content'):</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control summernote">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.order'):</label>
                                <div class="col-sm-10"><input type="number" min="0" name="order" class="form-control" value="{{ old('order') }}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.status'):</label>
                                <div class="col-sm-10">
                                    <input type="checkbox" name="status" class="js-switch" value="1" {{ old('status') === 1 ? 'checked' : '' }} />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('admin/_globals.buttons.create')</button></div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div id="tab-seo" class="tab-pane">
                    <div class="panel-body">
                        <fieldset class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.title'):</label>
                                <div class="col-sm-10">
                                    <input type="text" maxlength="70" name="seo_title" class="form-control" value="{{ old('seo_title') }}">
                                    <div class="text-muted">@lang('admin/_globals.forms.limit_characters',['limit' => 70])</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.description'):</label>
                                <div class="col-sm-10">
                                    <textarea maxlength="170" name="seo_description" class="form-control">{{ old('seo_description') }}</textarea>
                                    <div class="text-muted">@lang('admin/_globals.forms.limit_characters',['limit' => 170])</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.keywords'):</label>
                                <div class="col-sm-10">
                                    <textarea name="seo_keywords" class="form-control">{{ old('seo_keywords') }}</textarea>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                
            </div>
        </form>
        
	</div>

@endsection