<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class CurdController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = $this->model->orderBy('sort_id','desc')->get();
        return view($this->view,['datas'=>$datas]);
    }

    /**
     * Display a paginate controller
     *
     * @return a result of JsonType
     */
    public function apiPaginate()
    {
        $datas = $this->model->orderBy('sort_id','desc')->paginate(10);
        return $datas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas= [];
        return view($this->view.'_create',['datas'=>$datas]);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        return view($this->view.'_create',['datas'=>$datas]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $res = $this->model->destroy($id);
        if( $res )
        {
            $datas['sta'] = '1';
            $datas['msg'] = 'success';
        }else{
            $datas['sta'] = '';
            $datas['msg'] = 'error';
        }
        return $datas;
    }
}
