<?php

namespace App\Http\Controllers\Admin\Security;

use App\Http\Controllers\Controller;

class ForgetPasswordController extends Controller
{
    public function index()
    {
    	return view('admin.security.forget-password');
    }
}
