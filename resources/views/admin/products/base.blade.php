@extends('admin.base')

@section('content')
    
    <div class="page-heading">
    	<div class="pull-right">
	    	@yield('actions')
	    </div>
        <h2>@lang('admin/products.module') <small><i class="fa fa-angle-right"></i> @yield('subtitle')</small></h2>
    </div>
    
    @yield('products')

@endsection