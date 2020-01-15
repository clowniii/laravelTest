<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Core\CurdController;
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
        $arr = $this->model->orderBy('sort_id','desc')->get()->toArray();
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
        $colDatas = $this->getTree($this->model->orderBy('sort_id','desc')->get()->toArray());
        $modulesDatas = Modules::orderBy('sort_id','desc')->get();
        return view($this->view.'_create',['datas' => $datas,'modulesDatas' => $modulesDatas,'colDatas' => $colDatas]);
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

    private function getTree($data)
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
