<?php
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('/aaa',function(){
        return ['a','b','c'];
    });


    Route::get('/user',function (){
        $user = DB::table('users')->paginate(5)->links();
    //    $user = $user->appends(['sort' => 'notes']);
        return $user;

    });
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


    /*
     *后台路由
     */
    Route::get('/welcome.html','WelcomeController@index');
});

