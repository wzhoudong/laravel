<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Model\Users;  

use App\Http\Controllers\Controller;

use DB;

class UserController extends Controller
{
	//后台首页加载页面
	public function index()
	{
		$user = Users::select();
		dd($user);
		return view('admin.user.index');
	}

	//后台添加加载页面
	public function create()
	{
		return view('admin.user.create');
	}

	//后台修改加载页面
	public function edit($id)
	{
		return view('admin.user.edit');
	}

	//添加操作
	public function store()
	{
		
	}

	//添加操作
	public function update()
	{

	}

	//删除操作
	public function destroy()
	{

	}	
}
