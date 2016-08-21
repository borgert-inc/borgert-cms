<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Products\Categorys;

class CategorysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Categorys::sortable(['created_at' => 'desc'])->paginate(10);

        return view('admin.products.categorys.list', ['categorys' => $categorys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.categorys.create');
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
        ]);

        $category = new Categorys;

        $category->title = $request->title;
        $category->status = $request->status;

        $category->save();

        \Session::flash('success', trans('admin/products.contents.store.messages.success'));

        return redirect()->route('admin.products.categorys.list')->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categorys::find($id);

        return view('admin.products.categorys.edit', ['category' => $category]);
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
        ]);

        $category = Categorys::find($id);

        $category->title = $request->title;
        $category->status = $request->status;

        $category->save();

        \Session::flash('success', trans('admin/products.contents.update.messages.success'));

        return redirect()->route('admin.products.categorys.list')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (is_null($request->categorys)) {
            \Session::flash('info', trans('admin/products.contents.destroy.messages.info'));

            return redirect()->route('admin.products.categorys.list');
        }

        Categorys::destroy($request->categorys);
        \Session::flash('success', trans('admin/products.contents.destroy.messages.success'));

        return redirect()->route('admin.products.categorys.list');
    }
}
