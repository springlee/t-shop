<?php
namespace App\Traits;

use Illuminate\Http\Request;

trait AuthTraits
{
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->forget($this->guard()->getName());
        $request->session()->regenerate();

        return redirect()->route(strpos($this->guard()->getName(), 'admin') ? 'admin.login' : 'login');
    }
}
