<?php 

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redis; //使用redis类
use Illuminate\Support\Facades\Cookie; // 使用cookie类
use Illuminate\Http\Response;

/**
* 购物车控制器
*/
class ShopCartController extends Controller
{
	// 展示购物车列表
	public function shopCartList(Request $request)
	{
		$userId = 5;
		$cookieGoodsInfo = $request->cookie('shopCart');

		if (empty($userId)) 
		{
			if (isset($cookieGoodsInfo)) 
			{// 如果有cookie，则展示cookie中的内容
				foreach ($cookieGoodsInfo as $k=>$v) 
				{
					$cookieGoodsInfos[$k] = json_decode($v,1);
		        }
		        $goodsInfo = $this->cartList($cookieGoodsInfos);

		        return view('home.shoppingCart',['goodsInfo'=>$goodsInfo]);
			}
			else
			{ //如果没有cookie，则提示用户购物车为空
				return view('home.shoppingCart');
			}
		}
		else
		{
			// 如果登录，先查询cookie中的购物车数据，将它保存到redis中
			if (isset($cookieGoodsInfo)) 
			{
				foreach ($cookieGoodsInfo as $k=>$v) 
				{
					$cookieGoodsInfos[$k] = json_decode($v,1);
		        }
		        foreach ($cookieGoodsInfos as $key => $value) 
		        {
		        	$productId = $value['productId'];
		        	$goodsId = $value['goodsId'];
		        	$goodsNum = $value['goodsNum'];
		        	$this->addRedis($userId,$productId,$goodsId,$goodsNum);
		        	Cookie::queue(\Cookie::forget("shopCart[$productId]"));
		        }
			}
			
			$key = 'cart:ids:set:';

			$GoodsIdArr =  Redis::sMembers($key);

			if (!empty($GoodsIdArr)) 
			{
				for ($i=0; $i<count($GoodsIdArr); $i++) 
				{

		            $k  = 'cart:'.$userId.':'.$GoodsIdArr[$i];//id 

		            $list[] = Redis::hGetAll($k);
		        }

		        $goodsInfo = $this->cartList($list);
		        
		        return view('home.shoppingCart',['goodsInfo'=>$goodsInfo]);
			}
			else
			{
				return view('home.shoppingCart');
			}

			
		}
	}

	// 添加购物车数据
	public function addShopCart(Request $request)
	{
		$userId = "";

		$productId = $request->input('productId');

		$goodsId = $request->input('goodsId');

		$goodsNum = $request->input('goodsNum');

		if(empty($userId))
		{// 如果没有登录
			$shopInfo = [
				'goodsId' => $goodsId,
				'productId' => $productId,
				'goodsNum' => $goodsNum,
			];
			return response("加入购物车成功")->cookie("shopCart[$productId]",json_encode($shopInfo),30);
			echo json_encode(array('error'=>0));
		}
		else
		{//如果登录
			$this->addRedis($userId,$productId,$goodsId,$goodsNum);
			echo json_encode(array('error'=>0));
		}
	}

	/**
	 * 封装展示商品列表
	*/
	public function cartList($data)
	{
		// 从数组中单独取出货品的Id
        $productId = array_column($data,'productId');
        // 从数组中单独取出商品的Id
        $goodsId = array_column($data,'goodsId');
        // 从数组中单独取出需要购买的商品数量
        $goodsNum = array_column($data,'goodsNum');

        $goodsInfo = DB::table('product')
                ->whereIn('productId', $productId)
                ->join('goods', 'product.goodsId', '=', 'goods.goodsId')
                ->get()
                ->toArray();

        foreach ($goodsInfo as $k => $v)
        {
        	$goodsInfo[$k] = $v;

        	$goodsInfo[$k]->goodsNum = $goodsNum[$k];
        }
        return $goodsInfo;
	}

	// 封装加入redis
	public function addRedis($userId,$productId,$goodsId,$goodsNum)
	{
		$key = 'cart:'.$userId.':'.$productId;

    	$data = Redis::exists($key);

    	if (!$data) 
    	{// 如果redis中没有还数据则直接加入
    		$goodData = ['userId'=>$userId,'productId'=>$productId,'goodsId'=>$goodsId,'goodsNum'=>$goodsNum];

    		Redis::hmset($key, $goodData);

    		$key1 = 'cart:ids:set:';

        	//将商品ID存放集合中,是为了更好将用户的购物车的商品给遍历出来
        	Redis::sadd($key1, $productId);
    	}
    	else
    	{// 如果redis中有该数据，则改变其数量
    		$originNum = Redis::hget($key, 'goodsNum');

    		$newNum = $originNum+$goodsNum;

    		Redis::hset($key, 'goodsNum', $newNum);
    	}
	}

	/**
	 * 删除购物车
	*/
	public function deleteShopCart(Request $request)
	{
		$userId = 5;

		$productId = $request->input('productId');

		$goodsId = $request->input('goodsId');

		if (!empty($userId))
		{
			$key = 'cart:'.$userId.':'.$productId;
			
			Redis::hDel($key,'userId','productId','goodsId','goodsNum');

			$key1 = 'cart:ids:set:';

			Redis::sRem($key1, $productId);

			echo json_encode(array('error'=>0));
		}
		else
		{
			Cookie::queue(\Cookie::forget("shopCart[$productId]"));
			
			echo json_encode(array('error'=>0));
		}
	}
}