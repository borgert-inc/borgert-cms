@extends('admin.pages.base')

@section('title',  trans('admin/pages.contents.create.title'), @parent)

@section('actions')
    <a href="{{ route('admin.pages.contents.index') }}" class="btn btn-default"><i class="fa fa-angle-left"></i> @lang('admin/_globals.buttons.back')</a>
@endsection

@section('pages')
	
	@section('subtitle',  trans('admin/pages.contents.create.title'))

	<div class="tabs-container">

        <ul class="nav nav-tabs">
            <li><a class="nav-link active" data-toggle="tab" href="#tab-contents"> @lang('admin/_globals.forms.nav.contents')</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#tab-seo"> SEO</a></li>
        </ul>

		<form action="{{ route('admin.pages.contents.store') }}" method="post">
            <div class="tab-content">

                <div id="tab-contents" class="tab-pane active">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.category'):</label>
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
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.title'):</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.content'):</label>
                            <textarea name="description" class="form-control summernote">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.order'):</label>
                            <input type="number" min="0" name="order" class="form-control" value="{{ old('order') }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.status'):</label>
                            <input type="checkbox" name="status" class="js-switch" value="1" {{ old('status') === 1 ? 'checked' : '' }} />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('admin/_globals.buttons.create')</button>
                        </div>
                    </div>
                </div>

                <div id="tab-seo" class="tab-pane">
                    <div class="panel-body">
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.title'):</label>
                            <input type="text" maxlength="70" name="seo_title" class="form-control" value="{{ old('seo_title') }}">
                            <div class="text-muted">@lang('admin/_globals.forms.limit_characters',['limit' => 70])</div>
                        </div>
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.description'):</label>
                            <textarea maxlength="170" name="seo_description" class="form-control">{{ old('seo_description') }}</textarea>
                            <div class="text-muted">@lang('admin/_globals.forms.limit_characters',['limit' => 170])</div>
                        </div>
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.keywords'):</label>
                            <textarea name="seo_keywords" class="form-control">{{ old('seo_keywords') }}</textarea>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
        
	</div>

@endsection