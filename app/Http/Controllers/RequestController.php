<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
	public function index(Request $request)
	{
		//获取当前URL地址
		//echo $request->fullUrl();

		//获取路由部分‘
		//echo "<hr>";
		//echo $request->path();

		//判断请求类型
		// echo $request->method();

		//判断当前请求是不是GET请求
	var_dump($request->isMethod('POST'));
	}
}
