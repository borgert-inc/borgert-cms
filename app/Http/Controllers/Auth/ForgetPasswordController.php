<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class ForgetPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forget-password');
    }
}
