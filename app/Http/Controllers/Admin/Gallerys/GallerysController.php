<?php

namespace App\Http\Controllers\Admin\Gallerys;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
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

        $gallerys = Gallerys::paginate(10);

        return view('admin.gallerys.list',['gallerys' => $gallerys]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // TODO: Devemos trazer já as imagens da pasta TEMP caso exista
        
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

        $gallery->save();

        $path_from = 'gallerys/temp/';
        $path_to = 'gallerys/' . $gallery->id;

        if(\Storage::disk('uploads')->exists($path_from)){
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

        // Pegamos as imagens da galeria
        $images = \Storage::disk('uploads')->files('gallerys/' . $id);

        return view('admin.gallerys.edit',['gallery' => $gallery, 'images' => $images]);

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

        $gallery = new Gallerys;

        $gallery->title = $request->title;
        $gallery->content = $request->content;
        $gallery->status = $request->status;

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
        
        if(is_null($request->gallerys)){
            \Session::flash('info', 'Nenhuma galeria foi selecionado.');
            return redirect()->route('admin.gallerys.list');
        }

        Gallerys::destroy($request->gallerys);
        \Session::flash('success', 'A(s) galerias(s) foram removida(s) com sucesso!');

        // Precisamos remover as imagens desse ID também
        // tem que ser um foreach porque é um array de galerias
        foreach ($request->gallerys as $id) {
            
            // Checamos se o diretório existe
            $path = 'gallerys/' . $id;

            // Deletamos o diretório da imagem
            if(\Storage::disk('uploads')->exists($path)){
                \Storage::disk('uploads')->deleteDirectory($path);
            }

        }

        return redirect()->route('admin.gallerys.list');

    }


    public function upload(Request $request, $id)
    {

        $config = array(
            // 'script_url' => 'admin/gallerys/upload',
            'upload_dir' => base_path() . '/public/uploads/gallerys/temp/',
            'upload_url' => url('/') . '/uploads/gallerys/temp/',
            'delete_type' => 'POST',
            // 'image_versions' => array(
                // 'thumbnail' => array(
                    // 'max_width' => 180,
                    // 'max_height' => 180,
                    // 'upload_dir' => base_path() . '/public/uploads/gallerys/thumbnails/',
                    // 'upload_url' => url('/') . '/uploads/gallerys/thumbnails/',
                // ),
            // ),
        );

        new UploadHandler($config);

        return view('admin._inc.fileupload.empty');

    }

}
