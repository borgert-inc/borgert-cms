<nav class="navbar navbar-default bg-light shadow-sm">
  	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ route('blog.index') }}">@lang('blog/frontend.name')</a>
		</div>
		<form action="{{ route('blog.search') }}" class="navbar-form form-inline navbar-right" method="GET">
			<input type="text" name="term" class="form-control mr-2" placeholder="@lang('blog/frontend.search')">
			<button type="submit" class="btn btn-primary">@lang('blog/frontend.search_button')</button>
		</form>
  	</div>
</nav>
<br>