@extends('admin.profile.index')

@section('title', trans('admin/profile.module') , @parent )

@section('profile')
    
    <div class="row m-b-lg m-t-lg">
        <div class="col-md-6">
            <div class="profile-info text-center">
                <img src="{{ Gravatar::src(Auth::user()->email, 120) }}" class="img-circle">
                <br>
                <br>
                <h2 class="no-margins">{{ Auth::user()->name }}</h2>
                <h4>{{ Auth::user()->email }}</h4>
            </div>
        </div>
        
        <div class="col-md-6">
            
            <form action="{{ route('admin.profile.update') }}" method="post" class="ibox-content">

                <h3>@lang('admin/profile.profile.password.title')</h3>

                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label">@lang('admin/_globals.forms.name'):</label>
                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                    <label class="control-label">@lang('admin/_globals.forms.email'):</label>
                    <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}">
                </div>
                <div class="form-group">
                    <label class="control-label">@lang('admin/_globals.forms.language'):</label>
                    <select class='form-control' name="lang">
                        <option value="en" @if($user->lang == "en") selected @endif >English</option>
                        <option value="pt" @if($user->lang == "pt") selected @endif >Português</option>
                        <option value="es" @if($user->lang == "es") selected @endif >Español</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">@lang('admin/_globals.forms.password'):</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">@lang('admin/_globals.forms.confirm_password'):</label>
                    <input type="password" name="confirm_password" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label"></label>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('admin/_globals.buttons.save')</button>
                </div>

            </form>

        </div>


    </div>

@endsection