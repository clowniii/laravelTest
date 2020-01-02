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
    Route::get('/index','EntryController@index');
    Route::get('/login','EntryController@loginForm');
    Route::post('/login','EntryController@login');

    /*
     *后台路由
     */
    Route::get('/welcome.html','WelcomeController@index');
});

