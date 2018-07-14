<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

	@foreach($posts as $post)

		@if($loop->index == 0)
			<url>
				<loc>{{ route('blog.index') }}</loc>
				<lastmod>{{ $post->publish_at->format('Y-m-d') }}</lastmod>
                <changefreq>monthly</changefreq>
                <priority>1.0</priority>
			</url>
		@endif

		<url>
			<loc>{{ route('blog.post',['id'=>$post->id, 'title'=>str_slug($post->title)]) }}</loc>
			<lastmod>{{ $post->publish_at->format('Y-m-d') }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>

	@endforeach

    @foreach($categorys as $category)

        <url>
            <loc>{{ route('blog.category', ['id'=>$category->id,'title'=>str_slug($category->title)]) }}</loc>
            <lastmod>{{ $category->created_at->format('Y-m-d') }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>

    @endforeach

</urlset>