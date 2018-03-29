<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use DB;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	public function index()
	{
		echo '<pre>';
		print_r('前台控制器');
		echo '</pre>';
		exit;
		$data = db::table('course')->get();

		return view('user')->with('data',$data);
	}
}
