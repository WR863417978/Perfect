<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Common;
use DB;

/**
* Common控制器
*/
class CommonController extends Controller
{
	public static $menu;
	public function __construct(Request $request)
	{ 
		$uid = Cookie::get('adminuid');
		if(empty($uid)){
			echo "<a href='http://www.czshop.com/laravel/public/admin/login/index'>请先登录</a>";die;
			return view('jump')->with([
	            'message'=>'请先登录',
	            'url' =>"http://www.czshop.com/laravel/public/admin/login/index", 
	            'jumpTime'=>2,
	        ]);
		}
		$commons = new Common();
		self::$menu = $commons->getMenu();
	}
}
