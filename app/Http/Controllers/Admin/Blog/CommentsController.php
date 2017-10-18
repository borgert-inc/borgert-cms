<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Models\Admin\Blog\Comments;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    /**
     * @var Comments
     */
    protected $comments;

    /**
     * CommentsController constructor.
     * @param Comments $comments
     */
    public function __construct(Comments $comments)
    {
        $this->comments = $comments;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = $this->comments->where('status', '=', 0)->whereHas('post')->paginate(10);

        return view('admin.blog.comments.index', ['comments' => $comments]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aproved()
    {
        $comments = $this->comments->where('status', '=', 1)->whereHas('post')->paginate(10);

        return view('admin.blog.comments.aproved', ['comments' => $comments]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reproved()
    {
        $comments = $this->comments->where('status', '=', 2)->whereHas('post')->paginate(10);

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
        $comments = $this->comments->find($id);
        $comments->update(['status' => 1]);

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
        $comments = $this->comments->find($id);
        $comments->update(['status' => 2]);

        \Session::flash('success', trans('admin/blog.comments.reprove.messages.success'));

        return redirect()->back();
    }
}
