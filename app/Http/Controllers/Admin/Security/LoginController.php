<?php

namespace App\Http\Controllers\Admin\Security;

use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
    	return view('admin.security.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate()
    {
        if (Auth::attempt(['email' => $_POST['email'], 'password' => $_POST['password']])) {
            return redirect()->route('admin.index');
        }

        \Session::flash('error', 'Usuário ou senha inválidos!');

        return redirect()->route('login');
    }

}
