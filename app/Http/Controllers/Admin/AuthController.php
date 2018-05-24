<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\AuthTraits;

class AuthController extends Controller
{
    use AuthenticatesUsers, AuthTraits {
        AuthTraits::logout insteadof AuthenticatesUsers;
    }

    public function __construct()
    {
        $this->middleware(['guest.admin'], ['except' => 'logout']);
    }

    protected function redirectTo()
    {
        return env('ADMIN_URI', 'admin');
    }

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
