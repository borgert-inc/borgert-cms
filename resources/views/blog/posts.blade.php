@extends('blog.index')

@section('seo')
	@if(isset($category))
		@section('title', $category->seo('title') . ' | Blog ' . ($page > 1 ? '| Página ' . $page : ''))
		@include('blog/_inc/seo',['title' => $category->seo('title') . ' | O Postador', 'description' => $category->seo('description'), 'keywords' => $category->seo('keywords'), 'image' => null, 'url' => null])
	@else
		@section('title', 'Blog ' . ($page > 1 ? '| Página ' . $page : ''))
		@include('blog/_inc/seo',['title' => 'Blog | O Postador', 'description' => 'Mais que um blog, uma nova forma de gerir suas redes sociais. Receba notícias e dicas para obter mais sucesso na sua empresa. Acesse!', 'keywords' => '', 'image' => null, 'url' => null])
	@endif
@endsection

@section('blog')

	<section>

		@if(isset($term))
			<div class="term shadow-sm p-3">
				@lang('blog/frontend.search_term') <strong>{{ $term }}</strong>
			</div>
			<br>
		@endif
		
		@if(count($posts) > 0)

			@foreach($posts as $post)
				<div class="row post-resumo">
					<div class="col-sm-4 col-md-4 col-lg-4">
						<a href="{{ route('blog.post',['id'=>$post->id, 'title'=>str_slug($post->title)]) }}">
							@if($post->image())
								<img src="{{ asset($post->image()) }}" class="img-fluid" alt="{{ $post->title }}">
							@else
								<img src="{{ asset('assets/blog/img/no-image.jpg') }}" class="img-fluid" alt="{{ $post->title }}">
							@endif
						</a>
					</div>
					<div class="col-sm-8 col-md-8 col-lg-8">
						<a href="{{ route('blog.post',['id'=>$post->id, 'title'=>str_slug($post->title)]) }}">
							<h4>{{ $post->title }}</h4>
						</a>
						<span class="text-muted">{{ $post->publish_at->format('d/m/Y H:i') }}</span>
						<p>{{ $post->summary }}</p>
					</div>
				</div>
				<hr class="divider">
			@endforeach

			<div class="text-center">
				@if(isset($term))
					{{ $posts->appends(['term' => $term])->links() }}
				@else
					{{ $posts->links() }}
				@endif
			</div>

		@else
			<div class="text-center">
				<br>
				<br>
				<i class="fa fa-exclamation-triangle fa-3x"></i>
				<br>
				<p>@lang('blog/frontend.search_no_results')</p>
				<br>
			</div>
		@endif

	</section>

@endsection
