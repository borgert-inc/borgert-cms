@extends('admin.users.base')

@section('title',  trans('admin/users.create.title'), @parent)

@section('actions')
	<a href="{{ route('admin.users.index') }}" class="btn btn-default"><i class="fa fa-angle-left"></i> @lang('admin/_globals.buttons.back')</a>
@endsection

@section('users')
    
    @section('subtitle', trans('admin/users.create.title'))

    <div class="tabs-container">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-contentsdados"> @lang('admin/_globals.forms.nav.contents')</a></li>
            <li><a data-toggle="tab" href="#tab-images"> @lang('admin/_globals.forms.nav.images')</a></li>
        </ul>

        <form action="{{ route('admin.users.store') }}" method="post">
            <div class="tab-content">
                <div id="tab-contentsdados" class="tab-pane active">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <fieldset class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.name'):</label>
                                <div class="col-sm-10"><input type="text" name="name" class="form-control" placeholder="@lang('admin/_globals.forms.name')" value="{{ old('name') }}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.email'):</label>
                                <div class="col-sm-10"><input type="email" name="email" class="form-control" placeholder="@lang('admin/_globals.forms.email')" value="{{ old('email') }}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.password'):</label>
                                <div class="col-sm-10"><input type="password" name="password" class="form-control" placeholder="@lang('admin/_globals.forms.password')"></div>
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
                <div id="tab-images" class="tab-pane">
                    <div class="panel-body">
                        <h3>@lang('admin/users.gravatar.title')</h3>
                        <p>@lang('admin/users.gravatar.description')</p>
                        <a href="https://br.gravatar.com/" target="_blank" class="btn btn-primary">@lang('admin/users.gravatar.button') <i class="fa fa-external-link"></i></a>
                    </div>
                </div>
            </div>
        </form>

    </div>

@endsection