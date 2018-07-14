<?php

namespace App\Http\Controllers\Blog;

use App\Models\Admin\Blog\Posts;
use App\Http\Controllers\Controller;
use App\Models\Admin\Blog\Categorys;

class SitemapController extends Controller
{
    // -------------------------------------------------------------------

    public function index()
    {
        $posts = Posts::sortable(['publish_at' => 'asc'])->get();
        $categorys = Categorys::where('status', 1)->get();

        return response()->view('blog.sitemap', compact('posts', 'categorys'))->header('Content-Type', 'text/xml');
    }

    // -------------------------------------------------------------------
}
