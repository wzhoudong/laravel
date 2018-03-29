<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class PicController extends Controller
{
	//后台首页加载页面
	public function index()
	{
		// $num = DB::table("pic")->count();
		$num = count(DB::select('select * from pic order by sort asc'));

		$users = DB::table('pic')->paginate(3);
		return view('admin.pic.index')->with('data',$users);

		// $length = 3;

		// $page = $num/$length;

		// if(isset($_GET['page'])){
		// 	$offset = ($_GET['page']-1)*$length;

		// 	$data = DB::select("select * from pic order by sort asc limit $offset,$length");
		// 	//返回json输
		// 	return $data;
		// 	// 返回一个页面‘
		// 	// return view('admin.pic.page')->with('data',$data);
		// }

		// $data = DB::select("select * from pic order by sort asc limit 0,$length");
		
		// return view('admin.pic.index')->with('data',$data)->with('page',$page);
	}

	//后台添加加载页面
	public function create()
	{
		return view('admin.pic.create');
	}

	//后台修改加载页面
	public function edit($id)
	{
		$data = DB::select("select * from pic where id = '{$id}'");
		return view('admin.pic.edit')->with('data',$data[0]);
	}

	//添加操作
	public function store(Request $request)
	{
		$title = $request->input('title');
		$img = '/Uploads/Goods/'.$request->input('img');
		DB::insert("insert into pic(title,img,sort)  values('{$title}','{$img}',0)");
		return  redirect('/admin/pic');
	}

	//添加操作
	public function update(Request $request,$id)
	{
		$title = $request->input('title');
		$img = '/Uploads/Goods/'.$request->input('img');
		$sql = "update pic set title = '$title',img = '$img' where id = '$id'";
		$data = DB::update($sql);
		if($data){
			return  redirect('/admin/pic');
		}
		return back();
	}
	//删除操作
	public function destroy(Request $request)
	{
		$id = $request->input();

		$rsl = DB::table('pic')->where('id', $id)->delete();

		if($rsl){
			return ['code'=>$rsl,'msg'=>'删除成功'];
		}
		return false;
	}	

	public function delall(Request $request)
	{
		$str = $request->input('str');
		$rsl = DB::delete("delete from pic where id in($str)");
		if($rsl){
			return $rsl;
		}
		return false;
	}
	public function sort(Request $request)
	{
		$id = $request->input('id');
		$sort = $request->input('sort');
		$rsl = DB::update("update pic set sort = $sort where id = '$id'");
		if($rsl){
			return $rsl;
		}
		return false;
	}
}
