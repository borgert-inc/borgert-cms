<?php

namespace App\Http\Controllers\Admin\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Pages\Contents;
use App\Models\Admin\Pages\Categorys;

class ContentsController extends Controller
{
    /**
     * Display a linting of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Contents::sortable(['created_at' => 'desc'])->paginate(10);

        return view('admin.pages.contents.index', ['contents' => $contents]);
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'title' => 'required',
            'description' => 'required',
        ]);

        $content = new Contents();

        $content->category_id = $request->category_id;
        $content->title = $request->title;
        $content->description = $request->description;
        $content->order = $request->order;
        $content->status = (isset($request->status) ? 1 : 0);
        $content->seo_title = $request->seo_title;
        $content->seo_description = $request->seo_description;
        $content->seo_keywords = $request->seo_keywords;
        $content->slug = str_slug($request->title);
        $content->save();

        \Session::flash('success', trans('admin/pages.contents.store.messages.success'));

        return redirect()->route('admin.pages.contents.index')->withInput();
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
        $categorys = Categorys::all();
        $content = Contents::find($id);

        return view('admin.pages.contents.edit', ['categorys' => $categorys, 'content' => $content]);
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
            'category_id' => 'required|integer',
            'title' => 'required',
            'description' => 'required',
        ]);

        $content = Contents::find($id);

        $content->category_id = $request->category_id;
        $content->title = $request->title;
        $content->description = $request->description;
        $content->order = $request->order;
        $content->status = (isset($request->status) ? 1 : 0);
        $content->seo_title = $request->seo_title;
        $content->seo_description = $request->seo_description;
        $content->seo_keywords = $request->seo_keywords;
        $content->slug = str_slug($request->title);

        $content->save();

        \Session::flash('success', trans('admin/pages.contents.update.messages.success'));

        return redirect()->route('admin.pages.contents.index')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (is_null($request->contents)) {
            \Session::flash('info', trans('admin/pages.contents.destroy.messages.info'));

            return redirect()->route('admin.pages.contents.index');
        }

        Contents::destroy($request->contents);
        \Session::flash('success', trans('admin/pages.contents.destroy.messages.success'));

        return redirect()->route('admin.pages.contents.index');
    }
}
