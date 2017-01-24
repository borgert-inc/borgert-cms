<?php

namespace App\Http\Controllers\Admin\Profile;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.profile', ['user' => \Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'lang' => 'required',
            'password' => 'sometimes|min:6',
            'confirm_password' => 'sometimes|min:6',
        ]);

        if ($request->password != $request->confirm_password) {
            \Session::flash('success', trans('admin/profile.profile.password.messages.error'));

            return redirect()->route('admin.profile.profile');
        }

        $user = \Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->lang = $request->lang;

        if ($request->password != '') {
            $user->password = \Hash::make($request->password);
        }

        $user->save();
        \Session::flash('success', trans('admin/profile.profile.password.messages.success'));

        return redirect()->route('admin.profile.profile');
    }
}
