<link rel="stylesheet" type="text/css" href="{{url('static/h-ui/css/H-ui.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{url('static/h-ui.admin/css/H-ui.admin.css')}}" />
<link rel="stylesheet" type="text/css" href="{{url('lib/Hui-iconfont/1.0.8/iconfont.css')}}" />
<link rel="stylesheet" type="text/css" href="{{url('static/h-ui.admin/skin/default/skin.css')}}" id="skin" />
<link rel="stylesheet" type="text/css" href="{{url('static/h-ui.admin/css/style.css')}}" />
<article class="cl pd-20">
	<form action="add" method="post" class="form form-horizontal" id="form-admin-add">
		<div class="row cl">
			{{ csrf_field() }}
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="管理员" id="user" name="user">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>真实姓名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" autocomplete="off" value="" placeholder="真实姓名" id="realName" name="realName">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password" name="password">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="password2">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">角色：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
				<select class="select" name="role_id" size="1">
					<?php foreach($data as $k=>$v){?>
					<option value="{{ $v->role_id }}">{{ $v->role_name }}</option>
					<?php }?>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{url('lib/jquery/1.9.1/jquery.min.js')}}"></script> 
<script type="text/javascript" src="{{url('lib/layer/2.4/layer.js')}}"></script> 
<script type="text/javascript" src="{{url('static/h-ui/js/H-ui.js')}}"></script> 
<script type="text/javascript" src="{{url('static/h-ui.admin/js/H-ui.admin.page.js')}}"></script> 

<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{url('lib/jquery.validation/1.14.0/jquery.validate.js')}}"></script> 
<script type="text/javascript" src="{{url('lib/jquery.validation/1.14.0/validate-methods.js')}}"></script> 
<script type="text/javascript" src="{{url('lib/jquery.validation/1.14.0/messages_zh.js')}}"></script> 
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
});
</script>