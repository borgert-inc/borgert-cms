@extends('admin.products.index')

@section('title',  trans('admin/products.categorys.edit.title'), @parent)

@section('actions')
	<a href="{{ route('admin.products.categorys.list') }}" class="btn btn-default"><i class="fa fa-angle-left"></i> @lang('admin/_globals.buttons.back')</a>
@endsection

@section('products')
	
	@section('subtitle',  trans('admin/products.categorys.edit.title'))

	<div class="tabs-container">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-contents"> @lang('admin/_globals.forms.nav.contents')</a></li>
        </ul>

        <form action="{{ route('admin.products.categorys.update',$category->id) }}" method="post">
            <div class="tab-content">

                <div id="tab-contents" class="tab-pane active">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <fieldset class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.category'):</label>
                                <div class="col-sm-10"><input type="text" name="title" class="form-control" value="{{ $category->title }}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.status'):</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control">
                                        <option value="1" {{ $category->status === 1 ? 'selected' : '' }}>@lang('admin/_globals.forms.active')</option>
                                        <option value="0" {{ $category->status === 0 ? 'selected' : '' }}>@lang('admin/_globals.forms.inactive')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('admin/_globals.buttons.save')</button></div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            
          </div>
        </form>

	</div>

@endsection