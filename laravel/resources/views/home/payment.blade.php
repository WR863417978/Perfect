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
                <p>金额：<span class="pay-total">29.00元</span></p>
                <p>订单：1141124860003088</p>
                <p>
                    配送：庄明勇<span class="line">/</span>159****3461<span class="line">/</span>
                    福建,厦门市,思明区 福建厦门思明区湖滨四里64号湖光大厦11楼A座<span class="line">/</span>
                    不限送货时间<span class="line">/</span>个人电子发票</p>
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
                
                <dl class="payment-box" >
                    <dt>
                        <strong>银行网银</strong>
                        <p>支持以下各银行借记卡及信用卡</p>
                        <a href="#" target="_blank">查看支付限额&gt;</a>
                    </dt>
                    <dd>
                        <ul class="payment-list">
                            <li><label  for="CMB"><input type="radio" name="payOnlineBank" id="CMB" value="CMB" /> <img src="images/payOnline_zsyh.gif" alt=""/></label></li>
                            <li><label  for="ICBCB2C"><input type="radio" name="payOnlineBank" id="ICBCB2C" value="ICBCB2C" /> <img src="images/payOnline_gsyh.gif" alt=""/></label></li>
                            <li><label  for="CCB"><input type="radio" name="payOnlineBank" id="CCB" value="CCB" /> <img src="images/payOnline_jsyh.gif" alt=""/></label></li>
                            <li><label  for="ABC"><input type="radio" name="payOnlineBank" id="ABC" value="ABC" /> <img src="images/payOnline_nyyh.gif" alt=""/></label></li>
                            <li><label  for="BOCB2C"><input type="radio" name="payOnlineBank" id="BOCB2C" value="BOCB2C" /> <img src="images/payOnline_zgyh.gif" alt=""/></label></li>
                            <li><label  for="COMM"><input type="radio" name="payOnlineBank" id="COMM" value="COMM" /> <img src="images/payOnline_jtyh.gif" alt=""/></label></li>
                            <li><label  for="PSBC-DEBIT"><input type="radio" name="payOnlineBank" id="PSBC-DEBIT" value="PSBC-DEBIT" /> <img src="images/payOnline_youzheng.gif" alt=""/></label></li>
                            <li><label  for="GDB"><input type="radio" name="payOnlineBank" id="GDB" value="GDB" /> <img src="images/payOnline_gfyh.gif" alt=""/></label></li>
                            <li><label  for="SPDB"><input type="radio" name="payOnlineBank" id="SPDB" value="SPDB" /> <img src="images/payOnline_pufa.gif" alt=""/></label></li>
                            <li><label  for="CEBBANK"><input type="radio" name="payOnlineBank" id="CEBBANK" value="CEBBANK" /> <img src="images/payOnline_gdyh.gif" alt=""/></label></li>
                            <li><label  for="SPABANK"><input type="radio" name="payOnlineBank" id="SPABANK" value="SPABANK" /> <img src="images/payOnline_payh.gif" alt=""/></label></li>
                            <li><label  for="CIB"><input type="radio" name="payOnlineBank" id="CIB" value="CIB" /> <img src="images/payOnline_xyyh.gif" alt=""/></label></li>
                            <li><label  for="CMBC"><input type="radio" name="payOnlineBank" id="CMBC" value="CMBC" /> <img src="images/payOnline_msyh.gif" alt=""/></label></li>
                            <li><label  for="CITIC"><input type="radio" name="payOnlineBank" id="CITIC" value="CITIC" /> <img src="images/payOnline_zxyh.gif" alt=""/></label></li>
                            <li><label  for="SDB"><input type="radio" name="payOnlineBank" id="SDB" value="SDB" /> <img src="images/payOnline_sfyh.gif" alt=""/></label></li>
                            <li><label  for="SHBANK"><input type="radio" name="payOnlineBank" id="SHBANK" value="SHBANK" /> <img src="images/payOnline_shyh.gif" alt=""/></label></li>
                            <li><label  for="BJRCB"><input type="radio" name="payOnlineBank" id="BJRCB" value="BJRCB" /> <img src="images/payOnline_bjnsyh.gif" alt=""/></label></li>
                            <li><label  for="NBBANK"><input type="radio" name="payOnlineBank" id="NBBANK" value="NBBANK" /> <img src="images/payOnline_nbyh.gif" alt=""/></label></li>
                            <li><label  for="HZCBB2C"><input type="radio" name="payOnlineBank" id="HZCBB2C" value="HZCBB2C" /> <img src="images/payOnline_hzyh.gif" alt=""/></label></li>
                            <li><label  for="SHRCB"><input type="radio" name="payOnlineBank" id="SHRCB" value="SHRCB" /> <img src="images/payOnline_shnsyh.gif" alt=""/></label></li>
                            <li><label  for="FDB"><input type="radio" name="payOnlineBank" id="FDB" value="FDB" /> <img src="images/payOnline_fcyh.gif" alt=""/></label></li>                                </ul>
                    </dd>
                </dl>
                
                <dl class="payment-box" >
                    <dt>
                        <strong>信用卡支付</strong>
                        <p><span>无需网银快捷支付</span></p>
                    </dt>
                    <dd>
                        <ul class="payment-list">
                            <li><label  for="CMB-KQ"><input type="radio" name="payOnlineBank" id="CMB-KQ" value="CMB-KQ" /> <img src="images/payOnline_zsyh.gif" alt=""/></label></li>
                            <li><label  for="SPABANK-KQ"><input type="radio" name="payOnlineBank" id="SPABANK-KQ" value="SPABANK-KQ" /> <img src="images/payOnline_payh.gif" alt=""/></label></li>
                            <li><label  for="CCB-KQ"><input type="radio" name="payOnlineBank" id="CCB-KQ" value="CCB-KQ" /> <img src="images/payOnline_jsyh.gif" alt=""/></label></li>
                            <li><label  for="ICBCB2C-KQ"><input type="radio" name="payOnlineBank" id="ICBCB2C-KQ" value="ICBCB2C-KQ" /> <img src="images/payOnline_gsyh.gif" alt=""/></label></li>
                            <li><label  for="CITIC-KQ"><input type="radio" name="payOnlineBank" id="CITIC-KQ" value="CITIC-KQ" /> <img src="images/payOnline_zxyh.gif" alt=""/></label></li>
                            <li><label  for="CEBBANK-KQ"><input type="radio" name="payOnlineBank" id="CEBBANK-KQ" value="CEBBANK-KQ" /> <img src="images/payOnline_gdyh.gif" alt=""/></label></li>
                            <li><label  for="BOCB2C-KQ"><input type="radio" name="payOnlineBank" id="BOCB2C-KQ" value="BOCB2C-KQ" /> <img src="images/payOnline_zgyh.jpg" alt=""/></label></li>
                            <li><label  for="SRCB-KQ"><input type="radio" name="payOnlineBank" id="SRCB-KQ" value="SRCB-KQ" /> <img src="images/payOnline_shncsyyh.jpg" alt=""/></label></li>
                            <li><label  for="JSB-KQ"><input type="radio" name="payOnlineBank" id="JSB-KQ" value="JSB-KQ" /> <img src="images/payOnline_jiangsshuyh.gif" alt=""/></label></li>
                            <li><label  for="CMBC-KQ"><input type="radio" name="payOnlineBank" id="CMBC-KQ" value="CMBC-KQ" /> <img src="images/payOnline_msyh.gif" alt=""/></label></li>
                            <li><label  for="CIB-KQ"><input type="radio" name="payOnlineBank" id="CIB-KQ" value="CIB-KQ" /> <img src="images/payOnline_xyyh.gif" alt=""/></label></li>
                            <li><label  for="ABC-KQ"><input type="radio" name="payOnlineBank" id="ABC-KQ" value="ABC-KQ" /> <img src="images/payOnline_nyyh.gif" alt=""/></label></li>
                            <li><label  for="SDB-KQ"><input type="radio" name="payOnlineBank" id="SDB-KQ" value="SDB-KQ" /> <img src="images/payOnline_sfyh.gif" alt=""/></label></li>
                            <li><label  for="HXB-KQ"><input type="radio" name="payOnlineBank" id="HXB-KQ" value="HXB-KQ" /> <img src="images/payOnline_hyyh.png" alt=""/></label></li>
                            <li><label  for="GDB-KQ"><input type="radio" name="payOnlineBank" id="GDB-KQ" value="GDB-KQ" /> <img src="images/payOnline_gfyh.gif" alt=""/></label></li>                                </ul>
                    </dd>
                </dl>
            </div>
            <div class="box-ft">
            	<a href="#" class="next">下一步</a>
                <a href="checkout.html" class="modify">修改订单</a>
			</div>
		</div>
	</form>  
	</div>
    
    <div class="clear50"></div>
@endsection