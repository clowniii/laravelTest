<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EntryController extends CurdController
{
    //


    public function index()
    {

        return view('admin.index');
    }
    public function loginForm()
    {
        return view('admin.entry.login',['power'=>'本后台系统由doublek提供技术支持']);
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
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    public function checkLogin()
    {
        if( Auth::guard('admin')->check())
        {
            $data['sta'] = '1';
            $data['msg'] = 'isLogin';
        }else{
            $data['sta'] = 0;
            $data['msg'] = 'logout';
        }
        return $data;
    }
}
