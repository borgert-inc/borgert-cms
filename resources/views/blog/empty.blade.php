@extends('blog.index')

@section('title', 'Blog')

@section('blog')
    
	<section class="post">

		<div class="text-center">
			<br>
			<br>
			<br>
			<br>
			<i class="fa fa-search fa-2x"></i>
			<br>
			@lang('blog/frontend.search_no_results')
			<br>
			<br>
			<br>
			<br>
		</div>

	</section>

@endsection
