@if(count($categorys) > 0)
    <div class="list-group shadow-sm">
        @foreach($categorys as $category)
            <a href="{{ route('blog.categorie', ['id' => $category->id, 'title' => str_slug($category->title)]) }}" class="list-group-item"><span><i class="fa fa-angle-right"></i></span> {{ $category->title }}</a>
        @endforeach
    </div>
@endif
