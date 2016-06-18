<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Users;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::sortable(['created_at' => 'desc'])->paginate(10);

        return view('admin.users.list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'name'       => 'required',
            'email'      => 'required|email',
            'password'   => 'required',
        ]);

        $users = new Users;

        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = \Hash::make($request->password);
        $users->status = $request->status;

        $users->save();

        \Session::flash('success', 'O usuário foi atualizado com sucesso!');

        return redirect()->route('admin.users.list')->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Users::find($id);

        return view('admin.users.edit', ['user' => $user]);
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
            'name'       => 'required',
            'email'      => 'required|email',
            'password'   => 'required',
        ]);

        $user = Users::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->status = $request->status;

        $user->save();

        \Session::flash('success', 'O usuário foi atualizado com sucesso!');

        return redirect()->route('admin.users.list')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (is_null($request->users)) {
            \Session::flash('info', 'Nenhum usuário foi selecionado.');

            return redirect()->route('admin.users.list');
        }

        $user = \Auth::user();

        if (in_array($user->id, $request->users)) {
            \Session::flash('warning', 'Você não pode excluir seu próprio usuário!');

            return redirect()->route('admin.users.list');
        }

        Users::destroy($request->users);
        \Session::flash('success', 'O usuário(s) removido(s) com sucesso!');

        return redirect()->route('admin.users.list');
    }
}
