<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

/**
* 管理员列表
*/
class UserController extends CommonController
{
	//首页
	public function show(Request $request)
	{
		$models = new User();
		$data = $models->getAlluser();
		return view("admin.user.show",['data'=>$data,'menu'=>self::$menu]);
	}
	//添加管理员
	public function add(Request $request)
	{
		$models = new User();
		if($request->isMethod('get')){
			$data = $models->getAllrole();
			return view('admin.user.add',['data'=>$data,'menu'=>self::$menu]);
		}
		if($request->isMethod('post')){
			$data = $request->all();
			$res = $models->addUser($data);
			echo "添加成功";
		}
	}
}
