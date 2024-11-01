<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facards\Auth;
use App\Models\User;

class AdminUserController extends Controller
{
    public function show()
    {
        return view('admin.dashboard');
    }

    public function getUserList()
    {
        $users = User::get();

        return view('admin.user_list', compact('users'));
    }
}
