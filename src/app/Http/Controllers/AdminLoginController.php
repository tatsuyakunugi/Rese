<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminLoginRequest;

class AdminLoginController extends Controller
{
    public function getAdminLogin()
    {
        return view('admin.login');
    }

    public function postAdminLogin(AdminLoginRequest $request)
    {
        $credentials = $request->validate([
            'login_id' => 'required',
            'password' => 'required|min:8',
        ]);

        if (Auth::guard('admin')->attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect('admin');
        }
        return redirect('admin/login');
    }

    public function postAdminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('admin');
    }
}