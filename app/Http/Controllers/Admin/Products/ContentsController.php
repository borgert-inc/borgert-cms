<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Products\Categorys;
use App\Models\Admin\Products\Contents;

class ContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Contents::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.products.contents.list', ['contents' => $contents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Categorys::all();

        return view('admin.products.contents.create', ['categorys' => $categorys]);
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

        $content->save();

        \Session::flash('success', 'O produto foi criado com sucesso!');

        return redirect()->route('admin.products.contents.list');
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

        return view('admin.products.contents.edit',['categorys' => $categorys, 'content' => $content]);

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

        $content->save();

        \Session::flash('success', 'O produto foi atualizado com sucesso!');

        return redirect()->route('admin.products.contents.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(is_null($request->contents)){
            \Session::flash('info', 'Nenhuma produto foi selecionado.');
            return redirect()->route('admin.products.contents.list');
        }

        Contents::destroy($request->contents);
        \Session::flash('success', 'O(s) produto(s) foram removido(s) com sucesso!');

        return redirect()->route('admin.products.contents.list');
    }
}
