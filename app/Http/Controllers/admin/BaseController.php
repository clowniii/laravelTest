<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected $model = null;
    protected $view = '';
    public function __construct()
    {
        $this->middleware('admin.auth')->except(['login','loginForm']);
    }
}
