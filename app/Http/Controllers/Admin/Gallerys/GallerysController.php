<?php

namespace App\Http\Controllers\Admin\Gallerys;

use App\Libraries\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Gallerys\Gallerys;

class GallerysController extends Controller
{
    const UPLOAD_PATH = 'gallerys/';
    const UPLOAD_ROUTE = 'admin.gallerys.upload';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallerys = Gallerys::sortable(['created_at' => 'desc'])->paginate(10);

        return view('admin.gallerys.index', ['gallerys' => $gallerys]);
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $gallery = new Gallerys();

        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->order = $request->order;
        $gallery->status = (isset($request->status) ? 1 : 0);
        $gallery->seo_title = $request->seo_title;
        $gallery->seo_description = $request->seo_description;
        $gallery->seo_keywords = $request->seo_keywords;

        $gallery->save();

        $user = \Auth::User();
        $path_from = self::UPLOAD_PATH.'temp-'.$user->id.'/';
        $path_to = self::UPLOAD_PATH.$gallery->id;

        if (\Storage::disk('uploads')->exists($path_from)) {
            \Storage::disk('uploads')->move($path_from, $path_to);
        }

        \Session::flash('success', trans('admin/gallerys.store.messages.success'));

        return redirect()->route('admin.gallerys.index')->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
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
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $gallery = Gallerys::find($request->id);

        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->order = $request->order;
        $gallery->status = (isset($request->status) ? 1 : 0);
        $gallery->seo_title = $request->seo_title;
        $gallery->seo_description = $request->seo_description;
        $gallery->seo_keywords = $request->seo_keywords;

        $gallery->save();

        \Session::flash('success', trans('admin/gallerys.update.messages.success'));

        return redirect()->route('admin.gallerys.index')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (is_null($request->gallerys)) {
            \Session::flash('info', trans('admin/gallerys.destroy.messages.info'));

            return redirect()->route('admin.gallerys.index');
        }

        Gallerys::destroy($request->gallerys);
        \Session::flash('success', trans('admin/gallerys.destroy.messages.success'));

        // Precisamos remover as imagens desse ID também
        // tem que ser um foreach porque é um array de galerias
        foreach ($request->gallerys as $id) {
            // Checamos se o diretório existe
            $path = self::UPLOAD_PATH.$id;

            // Deletamos o diretório da imagem
            if (\Storage::disk('uploads')->exists($path)) {
                \Storage::disk('uploads')->deleteDirectory($path);
            }
        }

        return redirect()->route('admin.gallerys.index');
    }

    /**
     * Faz o envio ou carrrega as imagens de um diretório.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request, $id = null)
    {
        new Upload(
            $request,
            [
                'id' => $id,
                'route' => self::UPLOAD_ROUTE, // Route `routes/web.app`
                'path' => self::UPLOAD_PATH, // Path to upload file
            ]
        );
    }
}
