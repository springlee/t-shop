<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    use AuthenticatesUsers;

    public function dashboard()
    {
        $envs = [
            ['name' => 'php_version', 'value' => PHP_VERSION],
            ['name' => 'method', 'value' => 'post'],
        ];
        return view('admin.home.dashboard', compact('envs'));
    }
}
