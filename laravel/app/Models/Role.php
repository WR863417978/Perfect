<?php   
namespace App\Models;  
use Illuminate\Database\Eloquent\Model;  
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Cookie;
class Role extends Model{  
	//获取所有角色的权限
	public function getAllnode()
	{
		$data = DB::table('role')
            ->leftJoin('role_auth', 'role.role_id', '=', 'role_auth.role_id')
            ->leftJoin('auth', 'auth.auth_id', '=', 'role_auth.auth_id')
            ->select("role.role_id","role.role_name","role.role_content","auth.auth_name")
            ->get();
        $data = json_encode($data);
        $data = json_decode($data,1);
        foreach($data as $v){
			$v['node_name']=isset($arr[$v['role_id']]['node_name']) ? $arr[$v['role_id']]['node_name'].','.$v['auth_name']:$v['auth_name'];
			$arr[$v['role_id']]=$v;
		}
        return $arr;
	}
	//获取所有角色的用户
	public function getAlluser()
	{
		$data = DB::table('role')
            ->leftJoin('user_role', 'role.role_id', '=', 'user_role.role_id')
            ->leftJoin('adminuser', 'adminuser.id', '=', 'user_role.user_id')
            ->select('role.role_id',"role.role_name","role.role_content","adminuser.realName")
            ->get();
        $data = json_encode($data);
        $data = json_decode($data,1);
        foreach($data as $v){
			$v['role_name']=isset($arr[$v['role_id']]['role_name']) ? $arr[$v['role_id']]['role_name'].','.$v['realName']:$v['realName'];
			$arr[$v['role_id']]=$v;
		}
        return $arr;
	}
	//合并两个数组
	public function merageArr($node,$user)
	{
		foreach($node as $k=>$v){
			foreach($user as $key=>$val){
				$node[$k]['users'] = $user[$k]['role_name'];
			}
		}
		return $node;
	}
	//获取权限列表
	public function getNode()
	{
		$data = DB::table("auth")->get();
		$data = json_encode($data);
		$data = json_decode($data,1);
		$data = sortAuth($data);
		return $data;
	}
	//为角色添加权限
	public function addRole($data)
	{
		unset($data['_token']);
		$role_id = DB::table('role')->insertGetId(['role_name'=>$data['role_name'],'role_content'=>$data['role_content']]);
		foreach($data['auth'] as $k=>$v){
			$arr[$k]=array("role_id"=>$role_id,"auth_id"=>$v);
		}
		DB::table("role_auth")->insert($arr);
	}
}