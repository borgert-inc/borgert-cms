<?php

namespace App\Http\Controllers\Admin\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Pages\Categorys;

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

        return view('admin.pages.categorys.index', ['categorys' => $categorys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categorys.create');
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
        ]);

        $category = new Categorys();

        $category->title = $request->title;
        $category->order = $request->order;
        $category->status = (isset($request->status) ? 1 : 0);

        $category->save();

        \Session::flash('success', trans('admin/pages.categorys.store.messages.success'));

        return redirect()->route('admin.pages.categorys.index')->withInput();
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
        $category = Categorys::find($id);

        return view('admin.pages.categorys.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $category = Categorys::find($id);

        $category->title = $request->title;
        $category->order = $request->order;
        $category->status = (isset($request->status) ? 1 : 0);

        $category->save();

        \Session::flash('success', trans('admin/pages.categorys.update.messages.success'));

        return redirect()->route('admin.pages.categorys.index')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (is_null($request->categorys)) {
            \Session::flash('info', trans('admin/pages.categorys.destroy.messages.info'));

            return redirect()->route('admin.pages.categorys.index');
        }

        Categorys::destroy($request->categorys);
        \Session::flash('success', trans('admin/pages.categorys.destroy.messages.success'));

        return redirect()->route('admin.pages.categorys.index');
    }
}
