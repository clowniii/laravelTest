<?php
Route::get('/aaa',function(){

	return ['a','b','c'];

});

Route::get('/user',function (){
    $user = DB::table('users')->paginate(5)->links();
//    $user = $user->appends(['sort' => 'notes']);
    return $user;
});

Route::get('admin/login','LoginController@Index');