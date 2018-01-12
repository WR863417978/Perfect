<?php   
namespace App\Models;  
use Illuminate\Database\Eloquent\Model;  
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Cookie;
class Common extends Model{  
	public function getMenu()
	{
		$uid= Cookie::get('adminuid');
		if($uid==1){
			$obj = DB::table("auth")->orderBy("auth_id",'asc')->where(['is_show'=>1])->get();
			$menu = objToarr($obj);
			$menu = sortAuth($menu);
			return $menu;
		}else{
			$menu = DB::table('adminuser')
            ->leftJoin('user_role', 'adminuser.id', '=', 'user_role.user_id')
            ->leftJoin('role', 'role.role_id', '=', 'user_role.role_id')
            ->leftJoin('role_auth', 'role_auth.role_id', '=', 'role.role_id')
            ->leftJoin('auth','auth.auth_id','=','role_auth.auth_id')
            ->select('role.role_name',"auth.auth_name","auth.auth_id","auth.p_id","auth.controller","auth.functions")
            ->where(['adminuser.id'=>$uid,'is_show'=>1])
            ->orderBy("auth_id",'asc')
            ->get();
            $menu = objToarr($menu);
            $menu = sortAuth($menu);
            //print_r($menu);die;
            return $menu;
		}
	}
}  