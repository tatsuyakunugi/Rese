<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $user_info = $request->validate([
            'email' => 'email|required',
            'password' => 'required|min:4',
        ]);

        // ログインに成功したとき
        if (Auth::attempt($user_info)) {
            $request->session()->regenerate();
            return redirect('/');
        }
        //上記のif文でログインに成功した人以外(ログインに失敗した人)がここに来る
        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
