@extends('common/home/public')

@section('title', '填写订单信息')

@section('content')
    <!--checkout-box-->
    <div class="checkout-box">
        <form  id="checkoutForm" action="#" method="post">
        <div class="checkout-box-bd">
            <!-- 收货地址 -->
            <div class="box-hd">
                <h2 class="title">收货地址</h2>
            </div>
        
            <div class="xm-address-list" id="checkoutAddrList">
                <dl class="item selected">
                    <dt><strong class="itemConsignee">黄超</strong></dt>
                    <dd>
                        <p class="tel">139****2057</p>
                        <p class="itemRegion">河南 郑州市 管城回族区</p>
                        <p class="itemStreet">陇海东路126号新天地3D43(450000)</p>
                        <span class="edit-btn theme-login">编辑</span>
                    </dd>
                </dl>
                <dl class="item">
                    <dt><strong class="itemConsignee">庄明勇</strong></dt>
                    <dd>
                        <p class="tel">159****3461</p>
                        <p class="itemRegion">福建 厦门市 思明区</p>
                        <p class="itemStreet">福建厦门思明区湖滨四里64号湖光大厦11楼A座(361001)</p>
                        <span class="edit-btn theme-login">编辑</span>
                    </dd>
                </dl>
        
                <div class="item use-new-addr"  id="J_useNewAddr">
                     <span class="icon-add theme-login"></span> 
                    使用新地址
                </div>
            </div>

			<!--------------隐藏框----------------->
            <div class="theme-popover-mask"></div>
            <div class="theme-popover">
              <div class="xm-edit-addr-box" id="J_editAddrBox">
                    <div class="bd-box">
                                <div class="box-li">
                                    <input type="text" id="Consignee" maxlength="15" value="收货人姓名" onFocus="this.value=''" onBlur="if(!value){value=defaultValue;}">
                                    <p class="tip-msg tipMsg"></p>
                                </div>
                                <div class="box-li">
                                    <input type="text" id="Telephone" value="11位手机号" onFocus="this.value=''" onBlur="if(!value){value=defaultValue;}">
                                    <p class="tip-msg tipMsg"></p>
                                    <p style="font-size:12px; color:#666;">如果不修改手机号，请重新输入原收货手机号 <font color="#FF3300">139****2057</font> 以便确认</p>
                                </div>
                                <div class="box-li">
                                    <select id="Provinces" class="select-1">
                                        <option>省份/自治区</option>
                                    </select>
                                    <select id="Citys" class="select-2">
                                        <option>城市/地区/自治州</option>
                                    </select>
                                    <div class="clr10"></div>
                              <select id="Countys" class="select-3">
                                        <option>区/县</option>
                                    </select>
                                    <div class="clr10"></div>
                                <textarea  class="input-area" id="Street" placeholder="路名或街道地址，门牌号"></textarea>
                                    <p class="tip-msg tipMsg"></p>
                                </div>
                                <div class="box-li">
                                    <input type="text" id="Zipcode" class="input" value="邮政编码"  onFocus="this.value=''" onBlur="if(!value){value=defaultValue;}">
                                    <p class="zipcode-tip" id="zipcodeTip"></p>
                                    <p class="tip-msg tipMsg"></p>
                                </div>
                                <div class="box-li">
                                    <input type="text" id="Tag" class="input" value='地址标签：如"家"、"公司"。限5个字内'  onFocus="this.value=''" onBlur="if(!value){value=defaultValue;}">
                                    <p class="tip-msg tipMsg"></p>
                                </div>
                    </div>
                    <div class="ft">
                      <button  type="button"  class="close" id="J_editAddrCancel">重新选择地址</button>
                       <button type="button" class="J_editAddrOk" id="J_editAddrOk">确认收货地址</button>
                    </div>
                </div>
            </div>

            <!-- 收货地址 END-->

            <!-- 支付方式 -->
            <div class="box-hd ">
                <h2 class="title">支付方式</h2>
            </div>
            
            <div class="box-bd">
                <ul id="checkoutPaymentList" class="checkout-option-list">
                    <li class="item selected">
                        <p>在线支付<span></span></p>
                    </li>
                </ul>
            </div>
            <!-- 支付方式 END-->
            
            <!-- 配送方式 -->  
            <div class="box-hd ">
				<h2 class="title">配送方式</h2>
            </div>
            
            <div class="box-bd">
                <ul id="checkoutShipmentList" class="checkout-option-list">
                    <li class="item selected">
                        <p>加配送费 10 元<span></span></p>
                    </li>
                </ul>
            </div>
            <!-- 配送方式 END-->

            <!-- 送货时间 -->
            <div class="box-hd">
                <h2 class="title">送货时间</h2>
            </div>
            
            <div class="box-bd">
                <ul class="checkout-option-list"> 
                    <li class="item selected">
                        <p>不限送货时间<span>周一至周日</span></p>
                    </li>
                    <li class="item "><p>工作日送货<span>周一至周五</span></p></li>
                    <li class="item "><p>双休日、假日送货<span>周六至周日</span></p></li>
                </ul>
            </div>
            <!-- 送货时间 END-->
                
            <!-- 发票信息 -->
            <div class="box-hd">
                <h2 class="title">发票信息</h2>
            </div>
                
            <div class="box-bd">
                <ul class="checkout-option-list" id="Invoice">
                    <li class="item selected"><p>电子发票</p></li>
                    <li class="item"><p>普通发票</p></li>
                </ul>
                
                <p id="eInvoiceTip" class="e-invoice-tip ">电子发票是税务局认可的有效凭证，可作为售后维权凭据。开票后不可更换纸质发票，如需报销请选择普通发票。<a href="#" target="_blank">什么是电子发票？</a></p>
                
                <div class="invoice-info-0" style="display:none">
                    <p style="color:#1d7ad9">电子发票目前仅对个人用户开具，不可用于单位报销 </p>
                    <p>发票内容：购买商品明细</p>
                    <p>发票抬头：个人</p>
                    <p>
                        <dl>
                            <dt>什么是电子发票?</dt>
                            <dd>&#903; 电子发票是纸质发票的映像，是税务局认可的有效凭证，与传统纸质发票具有同等法律效力，可作为售后维权凭据。</dd>
                            <dd>&#903; 开具电子服务于个人，开票后不可更换纸质发票，不可用于单位报销。</dd>
                            <dd>&#903; 您在订单详情的"发票信息"栏可查看、下载您的电子发票。<a href="#" target="_blank">什么是电子发票？</a></dd>
                        </dl>
                    </p>
                </div>
                
                <div class="invoice-info-1" id="checkoutInvoiceDetail"  style="display:none;" >
                    <p>发票内容：购买商品明细</p>
                    <p>发票抬头：请确认单位名称正确,以免因名称错误耽搁您的报销。注：合约机话费仅能开个人发票</p>
                    <ul class="J_invoiceType">
                        <li class="item"><p>个人</p></li>
                        <li class="item"><p>单位</p></li>
                    </ul>
                    <div  id="CheckoutInvoiceTitle">
                        <label>单位名称：</label>
                        <input type="text" maxlength="49">
                    </div>
                </div>
    
            </div>
            <!-- 发票信息 END-->
            
            <!-- 商品清单 -->
            <div class="clr20"></div>
            <div class="box-hd">
                <h2 class="title" style="border-bottom: #fff solid 1px;">确认商品及优惠券</h2>
            </div>
            <div class="box-bd">
                <dl class="checkout-goods-list">
                    <dt>
                        <span class="col-1">商品名称</span>
                        <span class="col-2">单品价格</span>
                        <span class="col-3">购买数量</span>
                        <span class="col-4">小计</span>
                    </dt>
                    
                    <dd>
                        <div class="item-row">
                            <div class="col-1">
                                <div class="g-pic"><img src="images/502.jpg" width="40" height="40" /></div>
                                <div class="g-info"><a href="#" target="_blank">清水软胶保护套 黄色</a></div>
                            </div>
                            <div class="col-2">39元</div>
                            <div class="col-3">1</div>
                            <div class="col-4"><font color="#FF0000">39元</font></div>
                        </div>
                    </dd>
                    <dd>
                        <div class="item-row">
                            <div class="col-1">
                                <div class="g-pic"><img src="images/502.jpg" width="40" height="40" /></div>
                                <div class="g-info"><a href="#" target="_blank">清水软胶保护套 黄色</a></div>
                            </div>
                            <div class="col-2">39元</div>
                            <div class="col-3">1</div>
                            <div class="col-4"><font color="#FF0000">39元</font></div>
                        </div>
                    </dd>
                    <dd>
                        <div class="item-row">
                            <div class="col-1">
                                <div class="g-pic"><img src="images/502.jpg" width="40" height="40" /></div>
                                <div class="g-info"><a href="#" target="_blank">清水软胶保护套 黄色</a></div>
                            </div>
                            <div class="col-2">39元</div>
                            <div class="col-3">1</div>
                            <div class="col-4"><font color="#FF0000">39元</font></div>
                        </div>
                    </dd>
                </dl>       
			</div>
			<!-- 商品清单 end -->
            
            <!-- 结账 -->
            <div class="checkout-count">
            	<div class="checkout-count-extend">
                	<ul>
                    	<li><a href="javascript:;"><i class="icon-check"></i><p>仅显示特惠商品</p></a></li>
                        <li><a href="javascript:;"><i class="icon-check"></i><p>+1元得礼品包装：环保手提礼品袋</p></a></li>
                    </ul>
                </div>
                <div class="checkout-price">
                    <p><span>商品件数：</span><strong>2件</strong></p>
                    <p><span>金额合计：</span><strong>40元</strong></p>
                    <p><span>活动优惠：</span><strong>-0元</strong></p>
                    <p><span>优惠券抵扣：</span><strong>-0元</strong></p>
                    <p><span>运费：</span><strong>10元</strong></p>
                    <p class="ze"><span>应付总额：</span><strong>50000<i>元</i></strong></p>
                </div>
            </div>
            <!-- 结账 end -->
            <div class="box-ft">
            	<a href="payment.html" class="next">立即下单</a>
                <a href="shopping-cart.html" class="modify">返回购物车</a>
			</div>
            

        </div>
        </form>
    </div>
	
    <div class="clear50"></div>   
    
@endsection