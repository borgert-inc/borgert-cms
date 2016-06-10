@extends('admin.base')

@section('title', 'Produtos')

@section('content')
    
    <div class="page-heading">
    	<div class="pull-right">
	    	@yield('actions')
	    </div>
        <h2>Produtos <small><i class="fa fa-angle-right"></i> @yield('subtitle')</small></h2>
    </div>
    
    @yield('products')

@endsection