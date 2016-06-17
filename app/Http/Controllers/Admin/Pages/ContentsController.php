<?php

namespace App\Http\Controllers\Admin\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Pages\Categorys;
use App\Models\Admin\Pages\Contents;

class ContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Contents::sortable(['created_at' => 'desc'])->paginate(10);

        return view('admin.pages.contents.list', ['contents' => $contents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Categorys::all();

        return view('admin.pages.contents.create', ['categorys' => $categorys]);
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

        $content = new Contents;

        $content->category_id = $request->category_id;
        $content->title = $request->title;
        $content->content = $request->content;
        $content->status = $request->status;
        $content->seo_title = $request->seo_title;
        $content->seo_description = $request->seo_description;

        $content->save();

        \Session::flash('success', 'O conteúdo foi criado com sucesso!');

        return redirect()->route('admin.pages.contents.list');
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
        $content = Contents::find($id);

        return view('admin.pages.contents.edit', ['categorys' => $categorys, 'content' => $content]);
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

        $content = Contents::find($id);

        $content->category_id = $request->category_id;
        $content->title = $request->title;
        $content->content = $request->content;
        $content->status = $request->status;
        $content->seo_title = $request->seo_title;
        $content->seo_description = $request->seo_description;

        $content->save();

        \Session::flash('success', 'O conteúdo foi atualizado com sucesso!');

        return redirect()->route('admin.pages.contents.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (is_null($request->contents)) {
            \Session::flash('info', 'Nenhuma conteúdo foi selecionado.');

            return redirect()->route('admin.pages.contents.list');
        }

        Contents::destroy($request->contents);
        \Session::flash('success', 'O(s) conteúdos(s) foram removido(s) com sucesso!');

        return redirect()->route('admin.pages.contents.list');
    }
}
