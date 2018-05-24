<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
}
