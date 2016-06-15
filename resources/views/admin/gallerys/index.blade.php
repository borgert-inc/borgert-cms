@extends('admin.base')

@section('title', 'Galerias de Imagens')

@section('content')
    
    <div class="page-heading">
    	<div class="pull-right">
	    	@yield('actions')
	    </div>
        <h2>Galerias de Imagens <small><i class="fa fa-angle-right"></i> @yield('subtitle')</small></h2>
    </div>
    
    @yield('gallerys')

@endsection