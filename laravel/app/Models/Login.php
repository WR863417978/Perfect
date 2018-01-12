<?php   
namespace App\Models;  
use Illuminate\Database\Eloquent\Model;  
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Cookie;
class Login extends Model{  
	public function verify($data)
	{
		unset($data['_token']);
		$res = DB::table('adminuser')
		->where([
    		['user', '=', $data['user']],
    		['password', '=', sha1(md5($data['password']))],
		])
		->get()->toArray();
		if(is_array($res)){
			Cookie::queue('adminuid', $res[0]->id);
			Cookie::queue('admimuname', $res[0]->realName);
			return 1;
		}else{
			return 2;
		}
	}
}  