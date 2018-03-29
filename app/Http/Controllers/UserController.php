<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function photo()
	{
		return view('photo');
	}

	public function upload(Request $request)
	{
		if($request->hasFile('img')){
			//获取后缀名
		 	$ext=$request->file('img')->getClientOriginalExtension();
		 	//别名
			$newFile=time().rand().".".$ext;
			//上传
			$request->file('img')->move('./Uploads',$newFile);
		}else{	
			//返回上层
			return back();
		}
	}

	public function cookie()
	{
		echo '<pre>';
		print_r('sss');
		echo '</pre>';
		exit;
	}
}
