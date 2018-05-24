<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest.admin', ['except' => 'logout']);
    }

    use AuthenticatesUsers;

    protected $redirect = '/admin';

    public function username()
    {
        return 'username';
    }

    protected function guard()
    {
        return auth()->guard('admin');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
}
