<?php

namespace App\Http\Controllers\Admin\Gallerys;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Gallerys\Gallerys;
use App\Libraries\UploadHandler;

class GallerysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallerys = Gallerys::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.gallerys.list', ['gallerys' => $gallerys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallerys.create');
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
            'title'       => 'required',
            'content'     => 'required',
            'status'      => 'required|integer',
        ]);

        $gallery = new Gallerys;

        $gallery->title = $request->title;
        $gallery->content = $request->content;
        $gallery->status = $request->status;
        $gallery->seo_title = $request->seo_title;
        $gallery->seo_description = $request->seo_description;

        $gallery->save();

        $user = \Auth::User();
        $path_from = 'gallerys/temp-'.$user->id.'/';
        $path_to = 'gallerys/'.$gallery->id;

        if (\Storage::disk('uploads')->exists($path_from)) {
            \Storage::disk('uploads')->move($path_from, $path_to);
        }

        \Session::flash('success', 'A galeria foi criada com sucesso!');

        return redirect()->route('admin.gallerys.list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallerys::find($id);

        return view('admin.gallerys.edit', ['gallery' => $gallery]);
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
            'title'       => 'required',
            'content'     => 'required',
            'status'      => 'required|integer',
        ]);

        $gallery = Gallerys::find($id);

        $gallery->title = $request->title;
        $gallery->content = $request->content;
        $gallery->status = $request->status;
        $gallery->seo_title = $request->seo_title;
        $gallery->seo_description = $request->seo_description;

        $gallery->save();

        \Session::flash('success', 'A galeria foi atualizada com sucesso!');

        return redirect()->route('admin.gallerys.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (is_null($request->gallerys)) {
            \Session::flash('info', 'Nenhuma galeria foi selecionado.');

            return redirect()->route('admin.gallerys.list');
        }

        Gallerys::destroy($request->gallerys);
        \Session::flash('success', 'A(s) galerias(s) foram removida(s) com sucesso!');

        // Precisamos remover as imagens desse ID também
        // tem que ser um foreach porque é um array de galerias
        foreach ($request->gallerys as $id) {
            // Checamos se o diretório existe
            $path = 'gallerys/'.$id;

            // Deletamos o diretório da imagem
            if (\Storage::disk('uploads')->exists($path)) {
                \Storage::disk('uploads')->deleteDirectory($path);
            }
        }

        return redirect()->route('admin.gallerys.list');
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
            'script_url' => '/admin/gallerys/upload/'.$path.'/',
            'upload_dir' => base_path().'/public/uploads/gallerys/'.$path.'/',
            'upload_url' => url('/').'/uploads/gallerys/'.$path.'/',
            'delete_type' => 'GET',
        ];


        // Deletamos a imagem por GET
        if (isset($request->file)) {
            $file = 'gallerys/'.$path.'/'.$request->file;
            if (\Storage::disk('uploads')->has($file)) {
                \Storage::disk('uploads')->delete($file);
            }

            $thumb = 'gallerys/'.$path.'/thumbnail/'.$request->file;
            if (\Storage::disk('uploads')->has($thumb)) {
                \Storage::disk('uploads')->delete($thumb);
            }
        }

        new UploadHandler($config);

        return view('admin._inc.fileupload.empty');
    }
}
