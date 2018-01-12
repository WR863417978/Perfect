@extends('common/home/public')

@section('title', '选择付款方式')

@section('content')


    <!--payment-con-->
	<div class="payment-con">
    <form  target="_blank" action="#" id="pay-form" method="post">
    	<!--用户信息-->
        <div class="order-info">
            <div class="icon-box">
                <i class="iconfont"></i>
            </div>
            
            <div class="msg">
                <h3>您的订单已提交成功！付款咯～</h3>
                <p class="post-date">成功付款后，7天发货</p>
            </div>

            <div class="info">
                <p>金额：<span class="pay-total">{{$orderInfo->payment}}元</span></p>
                <p>订单：{{$orderInfo->orderCode}}</p>
                <p>
                    配送：{{$orderInfo->receiverName}}<span class="line">/</span>{{$orderInfo->receiverMobile}}<span class="line">/</span>
                    {{$orderInfo->receiverAddress}}<span class="line">/</span>
                    {{$orderInfo->deliveryTime}}<span class="line">/</span>个人电子发票</p>
            </div>


        </div>

        <div class="xm-plain-box">
            <!-- 选择支付方式 -->
            <h2 class="title">选择支付方式</h2>
            <!-- 选择支付方式 -->
            <div class="box-bd" id="bankList">
                <dl class="payment-box" >
                    <dt>
                        <strong>支付平台</strong>
                        <p>手机等大额支付推荐使用支付宝快捷支付</p>
                    </dt>
                    <dd>
                        <ul class="payment-list">
                            <li><label for="cft"><input type="radio" name="payOnlineBank" id="cft" value="cft" /> <img src="images/cft.gif" alt=""/></label></li>
                            <li><label for="alipay"><input type="radio" name="payOnlineBank" id="alipay" value="alipay" /> <img src="images/payOnline_zfb.gif" alt=""/></label></li>
                        </ul>
                    </dd>
                </dl>
            </div>
            <div class="box-ft">
            	<a href="{{URL('home/pay?orderCode=')}}{{$orderInfo->orderCode}}" class="next">下一步</a>
                <a href="checkout.html" class="modify">修改订单</a>
			</div>
		</div>
	</form>  
	</div>

    <div class="clear50"></div>
@endsection
