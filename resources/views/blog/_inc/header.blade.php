<nav class="navbar navbar-default">
  	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ route('blog.index') }}">@lang('blog/frontend.name')</a>
		</div>
		<form action="{{ route('blog.search') }}" class="navbar-form navbar-right" method="GET">
			<div class="form-group">
				<input type="text" name="term" class="form-control" placeholder="@lang('blog/frontend.search')">
			</div>
			<button type="submit" class="btn btn-default">@lang('blog/frontend.search_button')</button>
		</form>
  	</div>
</nav>
