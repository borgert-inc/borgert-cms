<?php

namespace App\Http\Controllers\Admin\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Blog\Categorys;

class CategorysController extends Controller
{
    /**
     * @var Categorys
     */
    protected $categorys;

    /**
     * CategorysController constructor.
     * @param Categorys $categorys
     */
    public function __construct(Categorys $categorys)
    {
        $this->categorys = $categorys;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = $this->categorys->sortable(['created_at' => 'desc'])->paginate(10);

        return view('admin.blog.categorys.index', ['categorys' => $categorys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.categorys.create');
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

        $categoryDetails = $request->all();
        $categoryDetails['status'] = isset($request->status) ? 1 : 0;
        $this->categorys->create($categoryDetails);

        \Session::flash('success', trans('admin/blog.categorys.store.messages.success'));

        return redirect()->route('admin.blog.categorys.index')->withInput();
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
        $category = $this->categorys->find($id);

        return view('admin.blog.categorys.edit', ['category' => $category]);
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
        ]);

        $category = $this->categorys->find($request->id);

        $categoryDetails = $request->all();
        $categoryDetails['status'] = isset($request->status) ? 1 : 0;
        $category->update($categoryDetails);

        \Session::flash('success', trans('admin/blog.categorys.update.messages.success'));

        return redirect()->route('admin.blog.categorys.index')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (is_null($request->categorys)) {
            \Session::flash('info', trans('admin/blog.categorys.destroy.messages.info'));

            return redirect()->route('admin.blog.categorys.index');
        }

        $this->categorys->destroy($request->categorys);
        \Session::flash('success', trans('admin/blog.categorys.destroy.messages.success'));

        return redirect()->route('admin.blog.categorys.index');
    }
}
