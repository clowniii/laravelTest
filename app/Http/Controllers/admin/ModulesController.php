<?php

namespace App\Http\Controllers\Admin;
use App\Model\Admin\Modules;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModulesController extends CurdController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Modules::orderBy('sort_id','desc')->get();
        return view('admin.system.modules',['modules'=>$modules]);
    }

    /**
     * Display a paginate controller
     *
     * @return a result of JsonType
     */
    public function apiPaginate()
    {
        $modules = Modules::orderBy('sort_id','desc')->paginate(10);
        return $modules;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules= [];
        return view('admin.system.modules_create',['modules'=>$modules]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['id'] = $request->input('id');
        $data['title'] = $request->input('title');
        $data['controller'] = $request->input('controller');
        if( $data['id'] )
        {
            $res = Modules::where('id',$data['id'])->update($data);
        } else {
            unset($data['id']);
            $res = Modules::insertGetId($data);
        }
        dd($res);
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
        $modules = Modules::where('id',$id)->first();

        return view('admin.system.modules_create',['modules'=>$modules]);

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
    }
}
