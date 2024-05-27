<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserContoroller extends Controller
{
    public function menu()
    {
        return view('menu');
    }
}
