@extends('blog.index')

@section('title', $post->seo('title') . ' | Blog')
@section('description', $post->seo('description'))

@section('seo')
    @include('blog/_inc/seo',['title' => $post->seo('title'), 'description' => $post->seo('description'), 'keywords' => $post->seo('keywords'), 'image' => $post->image(), 'url' => route('blog.post',['id'=>$post->id, 'title'=>str_slug($post->title)])])
@endsection

@section('blog')

	@if($post)

		<article class="post">

			<h1>{{ $post->title }}</h1>
			<h3>{{ $post->summary }}</h3>

			<p class="text-muted">{{ $post->publish_at->format('d/m/Y H:i') }}</p>

			<div class="description">
				{!! $post->description !!}
			</div>

			<br>

			<div>

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li><a href="#comment" class="nav-link active" aria-controls="comment" role="tab" data-toggle="tab">@lang('blog/frontend.comments_nav_comment')</a></li>
					<li><a href="#comments" class="nav-link" aria-controls="comments" role="tab" data-toggle="tab">@lang('blog/frontend.comments_nav_comments')</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="comment">
						<br>
						<form action="{{ route('blog.comment', [ 'id' => $post->id, 'title' => str_slug($post->title) ]) }}" method="POST">
							{{ csrf_field() }}
							<div class="form-group">
								<label>@lang('blog/frontend.comments_name')</label>
								<input type="text" class="form-control" name="name" placeholder="@lang('blog/frontend.comments_name')">
							</div>
							<div class="form-group">
								<label>@lang('blog/frontend.comments_email')</label>
								<input type="email" class="form-control" name="email" placeholder="@lang('blog/frontend.comments_email')">
							</div>
							<label>@lang('blog/frontend.comments_comment')</label>
							<textarea name="comment" class="form-control" rows="3"></textarea> 
							<br>
							<button type="submit" class="btn btn-primary">@lang('blog/frontend.comments_button')</button>
						</form>
					</div>
					<div role="tabpanel" class="tab-pane" id="comments">
						<br>
						<ul class="list-group">
							@foreach($post->comments as $key => $comment)
								@if($comment->status == 1)
									<li class="list-group-item">
										<strong>{{ $comment->name }}</strong> <small>- {{ $comment->created_at->format('d/m/Y H:i') }}</small><br>
										{{ $comment->description }}
									</li>
								@endif
							@endforeach
						</ul>
					</div>
				</div>

			</div>

			<div>
				
				<div role="tabpanel" class="tab-pane active" id="home">
					
				</div>
				<div role="tabpanel" class="tab-pane" id="profile">
					
				</div>
				</div>


		</article>

	@else
		<div class="text-center">
			<br>
			<br>
			<br>
			<br>
			<br>
			@lang('blog/frontend.search_no_results')
		</div>
	@endif

@endsection
