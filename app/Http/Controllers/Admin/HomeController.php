<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\AuthTrait;

class HomeController extends Controller
{
    use AuthTrait;

    public function index()
    {
        $menus = $this->getUserMenus();

        return view('admin.home.index', compact('menus'));
    }

    public function dashboard()
    {
        $envs = [
            ['name' => 'php_version', 'value' => PHP_VERSION],
            ['name' => 'method', 'value' => 'post'],
        ];

        return view('admin.home.dashboard', compact('envs'));
    }
}
