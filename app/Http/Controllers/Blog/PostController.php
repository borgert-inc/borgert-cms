<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog\Posts;
use App\Models\Admin\Blog\Comments;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{

    // -------------------------------------------------------------------

    public function index(Request $request, $titulo, $id)
    {

        $post = Posts::where(['status' => 1, 'id' => $id])->first();

        if ($post) {
            return view('blog.post', compact('post'));
        }

        return view('blog.empty');

    }

    // -------------------------------------------------------------------

}
