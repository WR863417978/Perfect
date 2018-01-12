<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\Models\Capital;
use DB;

/**
* 红包批次控制器
*/
class CapitalController extends CommonController
{
	// 新增申请
	public function add(Request $request)
	{
		$capital = new Capital();
		if($request->isMethod('post')){
			$data = $request->all();
			//实例化
			$res = $capital->add($data);
			if($res){
				return view('jump')->with([
                    'message'=>'添加成功',
                    'url' =>"http://www.czshop.com/laravel/public/admin/capital/showme", 
                    'jumpTime'=>2,
                ]);
			}else{
				echo "2";
				echo '意外';die;
			}
		}else{
			return view('admin.capital.add',['menu'=>self::$menu]);
		}
	}

	//展示全部申请

	public function showAll()
	{
		$capital = new Capital();
		//实例化
		$data = $capital->getAll();
		return view('admin.capital.showall',['data'=>$data,'menu'=>self::$menu]);
	}

	//修改申请状态
	public function updateStatus(Request $request)
	{
		$capital = new Capital();
		//接收参数
		$data = $request->all();
		//实例化model
		$arr = $capital->updatestatus($data);
		echo json_encode($arr);
	}

	//展示申请详情
	public function details(Request $request)
	{
		$capital = new Capital();
		$id = $request->input('id');
		$data = $capital->getOne($id);
		return view("admin.capital.detials",['data'=>$data,'menu'=>self::$menu]);
	}

	//展示我的申请
	public function showMe()
	{
		$capital = new Capital();
		$data = $capital->getMe();
		return view("admin.capital.showme",['data'=>$data,'menu'=>self::$menu]);
	}
}