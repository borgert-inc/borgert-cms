<?php

namespace App\Http\Controllers\Admin\Security;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function logout()
    {
    	\Auth::logout();

    	return redirect()->route('login');
    }
}
