<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Login extends Controller
{
    //
    public function Index()
    {
        return view('admin.login');
    }
}
