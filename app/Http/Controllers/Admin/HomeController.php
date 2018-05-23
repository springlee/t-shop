<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function dashboard()
    {
        $envs = [
            ['name' => 'php_version', 'value' => PHP_VERSION],
            ['name' => 'method', 'value' => 'post'],
        ];
        return view('admin.home.dashboard', compact('envs'));
    }
}
