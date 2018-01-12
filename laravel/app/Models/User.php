<?php   
namespace App\Models;  
use Illuminate\Database\Eloquent\Model;  
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Cookie;
class User extends Model{  
	//获取全部用户
	public function getAlluser()
	{
		$data = DB::table('adminuser')
            ->leftJoin('user_role', 'adminuser.id', '=', 'user_role.user_id')
            ->leftJoin('role', 'role.role_id', '=', 'user_role.role_id')
            ->get();
        return $data;
	}
	//获取全部角色
	public function getAllrole()
	{
		$data = DB::table("role")->get();
		return $data;
	}
	//添加管理员
	public function addUser($data)
	{
		unset($data['_token']);
		$uid = DB::table("adminuser")->insertGetId(['user'=>$data['user'],'password'=>sha1(md5($data['password'])),'realName'=>$data['realName']]);
		$res = DB::table("user_role")->insert(['user_id'=>$uid,'role_id'=>$data['role_id']]);
		return $res;
	}
}