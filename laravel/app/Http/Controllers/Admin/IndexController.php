<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

/**
* 首页控制器
*/
class IndexController extends CommonController
{
	// 首页
	public function index()
	{
		return view('admin.index',['menu'=>self::$menu]);
	}
}