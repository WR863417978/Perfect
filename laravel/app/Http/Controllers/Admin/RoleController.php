<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use DB;

/**
* 角色管理
*/
class RoleController extends CommonController
{
	//展示所有角色
	public function show()
	{
		$models = new Role();
		$node = $models->getAllnode();
		$user = $models->getAlluser();
		$data = $models->merageArr($node,$user);
		return view("admin.role.show",['data'=>$data,'menu'=>self::$menu]);
	}
	//添加角色
	public function add(Request $request)
	{
		$models = new Role();
		if($request->isMethod('get')){
			$data = $models->getNode();
			return view("admin.role.add",["data"=>$data,'menu'=>self::$menu]);
		}else if($request->isMethod('post')){
			$data = $request->all();
			//echo "<pre>";
			//print_r($data);die;
			$res = $models->addRole($data);
			echo '添加成功';
		}
	}
}
