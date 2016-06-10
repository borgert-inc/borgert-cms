<?php

namespace App\Http\Controllers\Admin\Security;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ForgetPasswordController extends Controller
{
    public function index()
    {
    	return view('admin.security.forget-password');
    }
}
