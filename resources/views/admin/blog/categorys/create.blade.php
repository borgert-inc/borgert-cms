@extends('admin.blog.base')

@section('title',  trans('admin/blog.categorys.create.title'), @parent)

@section('actions')
    <a href="{{ route('admin.blog.categorys.index') }}" class="btn btn-default"><i class="fa fa-angle-left"></i> @lang('admin/_globals.buttons.back')</a>
@endsection

@section('blog')
	
	@section('subtitle',  trans('admin/blog.categorys.create.title'), @parent)

	<div class="tabs-container">

        <ul class="nav nav-tabs">
            <li><a class="nav-link active" data-toggle="tab" href="#tab-contents"> @lang('admin/_globals.forms.nav.contents')</a></li>
        </ul>

		<form action="{{ route('admin.blog.categorys.store') }}" method="post">
            <div class="tab-content">
                <div id="tab-contents" class="tab-pane active">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.category'):</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
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
            </div>
        </form>
        
	</div>

@endsection