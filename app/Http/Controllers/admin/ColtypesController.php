<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Core\CurdController;
use App\Model\Admin\Coltypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColtypesController extends CurdController
{
    public function __construct()
    {
        parent::__construct();
        $this->view = 'admin.system.coltypes';
        $this->model = new Coltypes();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cid = $id;
        $datas = $this->model->where('cid','=','desc')->orderBy('sort_id','desc')->get();
//        dd($datas);
        return view($this->view,['datas'=>$datas]);
    }
}
