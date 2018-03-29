<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/user',"IndexController@index");

//获取配置文件
// Route::get('conf',function(){
// 	echo date("Y-m-d H:i:s");
// });
//资源路由
//Route::resource('Admin' , 'IndexController');

//命名路由
// Route::resource('abc' , 'IndexController@adc')->name('one');

// Route::resource('shuai' , 'IndexController@adc')->name('two');

//路由组
//后台	
// Route::group(['namespace' => 'Admin'],function(){
// 	Route::get('admin','IndexController@index');
// 	Route::get('admin/user','UserController@index');
// 	Route::get('admin/goods','GoodsController@index');
// });
Route::get('/foo', function () {
    return 'Hello World';
});

//登录路由
Route::get('admin/login','Admin\LoginController@index');

Route::get('admin/img','Admin\LoginController@img');

//登录操作
Route::post('admin/check','Admin\LoginController@check');

// 通过路由组 提取公共命名空间 公共的前缀 中间件
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::get('/','IndexController@index');
	Route::resource('/user','UserController');
	Route::resource('/pic','PicController');
	Route::post('/pic/delall','PicController@delall');
	Route::post('/pic/sort','PicController@sort');
	Route::any('shangchuan','commonController@uploads');
});

//前台
Route::group(['namespace' => 'Home'],function(){
	Route::get('/','IndexController@index');
});

//	请求
Route::get('request','RequestController@index');

Route::match(['get','post'],'admin/user/add','userController@add');

//图片上传
Route::get('photo','userController@photo');
//处理文件上传
Route::post('upload','userController@upload');
//处理文件上传
Route::get('cookie','userController@cookie');




