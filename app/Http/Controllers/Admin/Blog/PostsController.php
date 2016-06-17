<?php

namespace App\Http\Controllers\Admin\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Blog\Categorys;
use App\Models\Admin\Blog\Posts;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.blog.posts.list', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Categorys::all();

        return view('admin.blog.posts.create', ['categorys' => $categorys]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'title'       => 'required',
            'content'     => 'required',
            'status'      => 'required|integer',
        ]);

        $post = new Posts;

        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->status = $request->status;
        $post->seo_title = $request->seo_title;
        $post->seo_description = $request->seo_description;

        $post->save();

        \Session::flash('success', 'O post foi criado com sucesso!');

        return redirect()->route('admin.blog.posts.list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorys = Categorys::all();
        $post = Posts::find($id);

        return view('admin.blog.posts.edit', ['categorys' => $categorys, 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'title'       => 'required',
            'content'     => 'required',
            'status'      => 'required|integer',
        ]);

        $post = Posts::find($id);

        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->status = $request->status;
        $post->seo_title = $request->seo_title;
        $post->seo_description = $request->seo_description;

        $post->save();

        \Session::flash('success', 'O post foi atualizado com sucesso!');

        return redirect()->route('admin.blog.posts.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (is_null($request->posts)) {
            \Session::flash('info', 'Nenhum post foi selecionado.');

            return redirect()->route('admin.blog.posts.list');
        }

        Posts::destroy($request->posts);
        \Session::flash('success', 'O(s) post(s) foram removido(s) com sucesso!');

        return redirect()->route('admin.blog.posts.list');
    }
}
