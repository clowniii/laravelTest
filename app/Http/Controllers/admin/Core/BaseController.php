<?php

namespace App\Http\Controllers\Admin\Core;

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

    /*
     * Sort arrays
     * @param  $data is a array()
     * return $list  a array()
     */
    protected function getTree($data)
    {
        $items = array();

        foreach($data as $v){
            $items[$v['id']] = $v;
        }
        $tree = array();
        foreach($items as $k => $item){
            if(isset($items[$item['parent_id']])){
                $items[$item['parent_id']]['son'][] = &$items[$k];
            }else{
                $tree[] = &$items[$k];
            }
        }
        return $tree;
    }
}
