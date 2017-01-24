<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Models\Admin\Blog\Comments;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comments::where('status', '=', 0)->paginate(10);

        return view('admin.blog.comments.index', ['comments' => $comments]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aproved()
    {
        $comments = Comments::where('status', '=', 1)->paginate(10);

        return view('admin.blog.comments.aproved', ['comments' => $comments]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reproved()
    {
        $comments = Comments::where('status', '=', 2)->paginate(10);

        return view('admin.blog.comments.reproved', ['comments' => $comments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function aprove($id)
    {
        $comments = Comments::find($id);
        $comments->status = 1;
        $comments->save();

        \Session::flash('success', trans('admin/blog.comments.aprove.messages.success'));

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function reprove($id)
    {
        $comments = Comments::find($id);
        $comments->status = 2;
        $comments->save();

        \Session::flash('success', trans('admin/blog.comments.reprove.messages.success'));

        return redirect()->back();
    }
}
