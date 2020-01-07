<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;


class WelcomeController extends BaseController
{
    public function index()
    {
//        $ip = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
//        $ip = ($ip) ? $ip : $_SERVER["REMOTE_ADDR"];
        $data = [
            'file'          => dirname(__FILE__),
            'os'            => PHP_OS,
            'php_version'   => PHP_VERSION,
            'host'          => $_SERVER['HTTP_HOST'],
            'computer_name' => gethostbyaddr($_SERVER ['REMOTE_ADDR']),
            'domain_name'        => $_SERVER['SERVER_NAME'],
            'language'      => $_SERVER['HTTP_ACCEPT_LANGUAGE'],
            'server_port'   => $_SERVER['SERVER_PORT'],
            'signature'     => $_SERVER['SCRIPT_NAME'],
            'server_name'   => date('Y-m-d h:i:s',time()),
            'server'        => $_SERVER['REMOTE_ADDR'],
            'power'         => '本后台系统由doublek提供技术支持',
        ];
        return view('admin.welcome.welcome',$data);
    }
}
