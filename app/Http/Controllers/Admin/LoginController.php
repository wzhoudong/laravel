<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

class LoginController extends Controller
{
	public function index()
	{
		return view('admin.login');
	}

	public function img()
	{
		include "../resources/code/Code.class.php";
		$code = new \Code;
		$img = $code->make();
	}

	public function check(Request $request)
	{
		echo '<pre>';
		print_r($request->input());
		echo '</pre>';
		exit;
		if($_POST['name'] == 'admin' && $_POST['pass'] == '123'){
			session(['adminUserInfo' => $_POST]);
			return redirect('admin');
		}
		return redirect('admin/login');
	}

}
