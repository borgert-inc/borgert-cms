@extends('admin.products.base')

@section('title',  trans('admin/products.categorys.edit.title'), @parent)

@section('actions')
	<a href="{{ route('admin.products.categorys.index') }}" class="btn btn-default"><i class="fa fa-angle-left"></i> @lang('admin/_globals.buttons.back')</a>
@endsection

@section('products')
	
	@section('subtitle',  trans('admin/products.categorys.edit.title'))

	<div class="tabs-container">

        <ul class="nav nav-tabs">
            <li><a class="nav-link active" data-toggle="tab" href="#tab-contents"> @lang('admin/_globals.forms.nav.contents')</a></li>
        </ul>

        <form action="{{ route('admin.products.categorys.update',$category->id) }}" method="post">
            <div class="tab-content">
                <div id="tab-contents" class="tab-pane active">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.category'):</label>
                            <input type="text" name="title" class="form-control" value="{{ $category->title }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.order'):</label>
                            <input type="number" min="0" name="order" class="form-control" value="{{ $category->order }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('admin/_globals.forms.status'):</label>
                            <input type="checkbox" name="status" class="js-switch" value="1" {{ $category->status === 1 ? 'checked' : '' }} />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('admin/_globals.buttons.save')</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

	</div>

@endsection