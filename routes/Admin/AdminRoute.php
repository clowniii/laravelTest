<?php
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){

    /*
     *登录路由
     */
    //登录成功
    Route::get('/index','EntryController@index');
    //登录页面
    Route::get('/login','EntryController@loginForm');
    //退出登录
    Route::get('/logout','EntryController@logout');
    //表单提交
    Route::post('/login','EntryController@login');
    //验证是否登录
    Route::post('/check','EntryController@checkLogin');
    
    /*
     *后台路由
     */
    //我的桌面
    Route::get('/welcome.html','WelcomeController@index');
    //模块管理
    //分页接口
    Route::get('/modules/pages','ModulesController@apiPaginate');
    //模块资源
    Route::resources([
        '/modules'=>'ModulesController'
    ]);

    //栏目管理
    //分页接口
    Route::get('/columns/pages','ColumnsController@apiPaginate');
    //栏目资源
    Route::resources([
        'columns'=>'ColumnsController'
    ]);
});

