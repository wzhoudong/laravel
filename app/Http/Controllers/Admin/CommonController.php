<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class CommonController extends Controller
{
	//文件上传方法
	public function uploads(Request $request)
	{	
		$file = $request->file('Filedata');
		$dir=$request->input('files');
		if (file_exists("./Uploads/{$dir}")) {
		
		}else{
			mkdir("./Uploads/{$dir}");
		}
		// return view('admin.pic.index');

		if ($file->isValid()) {
			$ext =$file->getClientOriginalExtension();
			$newFile = time().rand().'.'.$ext;
			$file->move('./Uploads/'.$dir,$newFile);
			return $newFile;
		}
	}
}
