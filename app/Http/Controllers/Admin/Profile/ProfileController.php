<?php

namespace App\Http\Controllers\Admin\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request)
    {
        $this->validate($request, [
            'password'          => 'required',
            'confirm_password'  => 'required',
        ]);

        if($request->password <> $request->confirm_password){
            \Session::flash('success', trans('admin/profile.profile.password.messages.error'));
            return redirect()->route('admin.profile.profile');
        }

        $user = \Auth::user();
        $user->password = \Hash::make($request->password);
        $user->save();

        \Session::flash('success', trans('admin/profile.profile.password.messages.success'));

        return redirect()->route('admin.profile.profile');
    }

}
