<?php

namespace App\Http\Controllers\Blog;

use App\Models\Admin\Blog\Comments;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Request;

class CommentController extends Controller
{
    // -------------------------------------------------------------------

    public function index(Request $request, $title, $id)
    {
        Comments::create([
            'post_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->comment,
            'status' => 0,
        ]);

        \Session::flash('success', trans('blog/frontend.comments_success'));

        return redirect()->route('blog.post', ['id' => $id, 'title' => $title]);
    }

    // -------------------------------------------------------------------
}
