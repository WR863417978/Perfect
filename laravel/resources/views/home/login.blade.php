@extends('common/home/public')

@section('title', '用户登录')

@section('content')

    <!--main-->
	<div class="main">
    	<div class="login-left">
            
        	<div class="title"><h2>会员登录<span>LOGIN</span></h2></div>
            <form onsubmit="return check_all()">
            <div class="form-group">
            	<div class="input-k">
                	<span>帐号：</span><input type="text" id="account" name="account" onblur="check_account()" /><p class="prompt" id="error_box">请输入您的账号！</p>
                </div>
                <div class="input-k">
                	<span>密码：</span><input type="password" id="password" name="password" onblur="check_password()" /><p class="prompt" id="error_boxs">请输入您的登录密码！</p>
                </div>
                <div class="input-k">
                	<span></span><input type='checkbox' name='checkbox' value=1 class="checkbox"><span class="jzzt">记住登录状态&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">忘记密码？</a></span>
                </div>
                <div class="input-k">
                	<span></span><button type="submit">立即登录</button>
                </div>
            </div>
            </form>
            <div class="fast-login">
            	<p>使用合作网站帐号登录：</p>
                <div class="fast-logo">
                	<a href="#"><img src="images/fast-qq.jpg" /><span>QQ</span></a>
                    <a href="#"><img src="images/fast-xl.jpg" /><span>新浪微博</span></a>
                    <a href="#"><img src="images/fast-d.jpg" /><span>豆瓣</span></a>
                    <a href="#"><img src="images/fast-zfb.jpg" /><span>支付宝</span></a>
                    <a href="#"><img src="images/fast-rr.jpg" /><span>人人网</span></a>
                </div>
            </div>
        </div>
        
        <div class="login-right">
        	<p>还不是我们的会员？</p>
            <a href="register.html">十秒快速注册</a>
        </div>
        
    </div>
<script src="js/jquery.1.12.js"></script>
<script>
    /**
     * 验证用户名
    */
    function check_account(){
        var oAccount = document.getElementById("account");
        var oError = document.getElementById("error_box");
        var isNotError = true;
        oError.innerHTML = "";
        if(oAccount.value.length > 20 || oAccount.value.length < 6){
            oError.innerHTML = "<font color='red'>用户名长度必须在6~20位之间</font>";
            isNotError = false;
            return;
            
        }else if(oAccount.value.charCodeAt(0) >= 48 && oAccount.value.charCodeAt(0) <= 57){
            oError.innerHTML = "<font color='red'>用户名开头不能为数字</font>";
            isNotError = false;
            return;
        }else{
            for(var i=0; i<oAccount.value.length; i++){
                if((oAccount.value.charCodeAt(i) > 122 || oAccount.value.charCodeAt(i) < 97) && (oAccount.value.charCodeAt(i) > 57 || oUname.value.charCodeAt(i) < 48)){
                    oError.innerHTML = "<font color='red'>用户名只能包含小写字母和数字</font>";
                    isNotError = false;
                    return;
                }
            }
        }
    }

    /**
     * 验证密码
    */
    function check_password(){
        var oPassword = document.getElementById("password");
        var oError = document.getElementById("error_boxs");
        var isNotError = true;
        if(oPassword.value.length > 20 || oPassword.value.length < 6)
        {
            oError.innerHTML = "<font color='red'>密码长度必须在6~20位之间</font>";
            isNotError = false;
            return;
        }
        oError.innerHTML = "";
    }

    function check_all()
    {
        if(check_account()&check_password())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
</script>
@endsection