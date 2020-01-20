<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Core\CurdController;
use App\Model\Admin\Coltypes;
use App\Model\Admin\Columns;
use App\Model\Admin\Modules;
use Illuminate\Http\Request;


class ColumnsController extends CurdController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Columns();
        $this->view = 'admin.system.columns';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr = $this->model->orderBy('sort_id','asc')->get()->toArray();
        foreach($arr as $k => $v )
        {
            if(Coltypes::where('cid',$v['id'])->exists())
            {
                $arr[$k]['ctypes'] = '已存在';
            }else{
                $arr[$k]['ctypes'] = '未添加';
            }
        }
        $datas = $this->getTree($arr);


        return view($this->view,['datas'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas= [];
        $colDatas = $this->getTree($this->model->orderBy('sort_id','asc')->get()->toArray());
        $modulesDatas = Modules::orderBy('sort_id','desc')->get();
        return view($this->view.'_create',['datas' => $datas,'modulesDatas' => $modulesDatas,'colDatas' => $colDatas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = $this->model->where('id',$id)->first();
        $colDatas = $this->getTree($this->model->orderBy('sort_id','asc')->get()->toArray());
        $modulesDatas = Modules::orderBy('sort_id','desc')->get();


        return view($this->view.'_create',['datas'=>$datas,'colDatas'=>$colDatas,'modulesDatas'=>$modulesDatas]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->input();
        dd($data);die;
        unset($data['_token']);
        if( $data['id'] )
        {
            $res = $this->model->where('id',$data['id'])->update($data);
        } else {
            unset($data['id']);
            $arr = $this->model->orderBy('sort_id','desc')->pluck('sort_id')->first();
            $data['sort_id'] = ++$arr;
            $res = $this->model->insertGetId($data);
        }
//        dd($res);
    }

}
