<?php

namespace App\Http\Controllers\Admin\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Blog\Categorys;
use App\Models\Admin\Blog\Posts;
use App\Libraries\UploadHandler;

class PostsController extends Controller
{
    const UPLOAD_PATH = 'blog/posts/';
    const UPLOAD_ROUTE = 'admin.blog.posts.upload';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::sortable(['created_at' => 'desc'])->paginate(10);

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
            'publish_at'  => 'required',
            'category_id' => 'required|integer',
            'title'       => 'required',
            'content'     => 'required',
            'status'      => 'required|integer',
        ]);

        $post = new Posts;

        $post->publish_at = $request->publish_at;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->status = $request->status;
        $post->seo_title = $request->seo_title;
        $post->seo_description = $request->seo_description;

        $post->save();

        $user = \Auth::User();
        $path_from = self::UPLOAD_PATH.'temp-'.$user->id.'/';
        $path_to = self::UPLOAD_PATH.$post->id;

        if (\Storage::disk('uploads')->exists($path_from)) {
            \Storage::disk('uploads')->move($path_from, $path_to);
        }

        \Session::flash('success', trans('admin/blog.posts.store.messages.success'));

        return redirect()->route('admin.blog.posts.list')->withInput();
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
            'publish_at'  => 'required',
            'category_id' => 'required|integer',
            'title'       => 'required',
            'content'     => 'required',
            'status'      => 'required|integer',
        ]);

        $post = Posts::find($id);

        $post->publish_at = $request->publish_at;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->status = $request->status;
        $post->seo_title = $request->seo_title;
        $post->seo_description = $request->seo_description;

        $post->save();

        \Session::flash('success', trans('admin/blog.posts.update.messages.success'));

        return redirect()->route('admin.blog.posts.list')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (is_null($request->posts)) {
            \Session::flash('info', trans('admin/blog.posts.destroy.messages.info'));

            return redirect()->route('admin.blog.posts.list');
        }

        Posts::destroy($request->posts);
        \Session::flash('success', trans('admin/blog.posts.destroy.messages.success'));

        // Precisamos remover as imagens desse ID também
        // tem que ser um foreach porque é um array de galerias
        foreach ($request->contents as $id) {
            // Checamos se o diretório existe
            $path = self::UPLOAD_PATH.$id;

            // Deletamos o diretório da imagem
            if (\Storage::disk('uploads')->exists($path)) {
                \Storage::disk('uploads')->deleteDirectory($path);
            }
        }

        return redirect()->route('admin.blog.posts.list');
    }

    /**
     * Faz o envio ou carrrega as imagens de um diretório.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request, $id = null)
    {
        $user = \Auth::User();

        $path = 'temp-'.$user->id;

        if (is_numeric($id)) {
            $path = $id;
        }

        $config = [
            'script_url' => route(self::UPLOAD_ROUTE, $path),
            'upload_dir' => base_path().'/public/uploads/'.self::UPLOAD_PATH.$path.'/',
            'upload_url' => url('/').'/uploads/'.self::UPLOAD_PATH.$path.'/',
            'delete_type' => 'GET',
        ];


        // Deletamos a imagem por GET
        if (isset($request->file)) {
            $file = self::UPLOAD_PATH.$path.'/'.$request->file;
            if (\Storage::disk('uploads')->has($file)) {
                \Storage::disk('uploads')->delete($file);
            }

            $thumb = self::UPLOAD_PATH.$path.'/thumbnail/'.$request->file;
            if (\Storage::disk('uploads')->has($thumb)) {
                \Storage::disk('uploads')->delete($thumb);
            }
        }

        new UploadHandler($config);

        return view('admin._inc.fileupload.empty');
    }
}
