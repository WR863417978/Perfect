<?php 

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

/**
* 前台登录注册控制器
*/
class LoginController extends Controller
{
	// 登录页面
	public function login(Request $request)
	{
		if ($request->isMethod('post')) {
			$data = $request->input();
			print_r($data);die;
			return view('home.index');
			
		}
		else
		{
			return view('home.login');
		}
	}


	// 注册页面
}