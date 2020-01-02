<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EntryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin.auth')->except(['login','loginForm']);
    }

    public function index()
    {
        return view('admin.index');
    }
    public function loginForm()
    {
        return view('admin.entry.login');
    }
    public function login(Request $request)
    {
        $status = Auth::guard('admin')->attempt([
            'username'  => $request->input('username'),
            'password'  => $request->input('password'),
        ]);

        if( $status )
        {
            return redirect('/admin/index');
        }else {
            return redirect('admin/login')->with('error','用户名或密码错误');
        }
    }
}
