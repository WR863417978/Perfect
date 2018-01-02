<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});

/*
*		后台
*/
Route::group(['prefix'=>'admin','namespace'=>'\Admin'],function(){
		//首页展示
		Route::any('index','IndexController@index');
});




/********************************前台***********************************/

Route::group(['prefix'=>'home','namespace'=>'\Home'], function()
{
	route::any('login','LoginController@login');//登陆页面

	route::any('register',function(){
		return view('home.register');
	});//注册页面


	route::any('index','IndexController@index');//首页

	route::any('shopCart','ShopCartController@shopCartList');//购物车页面

	route::any('details',function(){
		return view('home.details');
	});//商品详情页面

	route::any('usa',function(){
		return view('home.usa');
	});//美国站

	route::any('search',function(){
		return view('home.search');
	});//搜索关键字后页面

	route::any('address',function(){
		return view('home.address');
	});//收货地址页面

	route::any('changePassword',function(){
		return view('home.changePassword');
	});//收货地址页面

	route::any('checkout',function(){
		return view('home.checkout');
	});//填写订单信息页面

	route::any('orderView',function(){
		return view('home.orderView');
	});//订单详情页面

	route::any('comment',function(){
		return view('home.comment');
	});//商品评价页面

	route::any('favorite',function(){
		return view('home.favorite');
	});//我的收藏夹页面

	route::any('order',function(){
		return view('home.order');
	});//我的收藏夹页面

	route::any('orderth',function(){
		return view('home.orderth');
	});//我的退货页面

	route::any('ordertk',function(){
		return view('home.ordertk');
	});//我的退款页面

	route::any('payment',function(){
		return view('home.payment');
	});//选择付款方式

	route::any('personal',function(){
		return view('home.personal');
	});//我的个人中心页面

	route::any('repairorder',function(){
		return view('home.repairorder');
	});//申请售后服务页面

	route::any('repairorderShow',function(){
		return view('home.repairorderShow');
	});//申请售后服务页面

	route::any('repairorderSuccess',function(){
		return view('home.repairorderSuccess');
	});//申请售后服务成功页面

	route::any('review',function(){
		return view('home.review');
	});//商品评价页面

	route::any('reviewShow',function(){
		return view('home.reviewShow');
	});//商品评价内容页面

});