<link rel="stylesheet" type="text/css" href="{{url('static/h-ui/css/H-ui.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{url('static/h-ui.admin/css/H-ui.admin.css')}}" />
<link rel="stylesheet" type="text/css" href="{{url('lib/Hui-iconfont/1.0.8/iconfont.css')}}" />
<link rel="stylesheet" type="text/css" href="{{url('static/h-ui.admin/skin/default/skin.css')}}" id="skin" />
<link rel="stylesheet" type="text/css" href="{{url('static/h-ui.admin/css/style.css')}}" />
<article class="cl pd-20">
	<form action="add" method="post" class="form form-horizontal" id="form-admin-role-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="role_name" name="role_name" datatype="*4-16" nullmsg="用户账户不能为空">
			</div>
		</div>
		{{ csrf_field() }}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">备注：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="role_content" name="role_content">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">网站权限：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<?php foreach($data as $k=>$v){?>
				<dl class="permission-list">
					<dt>
						<label>
							<input type="checkbox" value="" id="user-Character-0">
							{{ $v['auth_name'] }}</label>
					</dt>
					<dd>
						<dl class="cl permission-list2">
							<dt>
								<label class="">
									<input type="checkbox" value="{{ $v['auth_id'] }}" name="auth[]" id="user-Character-0-0">
									{{ $v['auth_name'] }}</label>
							</dt>
							<dd>
								<?php foreach($v['child'] as $key=>$val){?>
								<label class="">
									<input type="checkbox" value="{{ $val['auth_id'] }}" name="auth[]" id="user-Character-0-0-0">
									{{ $val['auth_name'] }}</label>
								<?php }?>
							</dd>
						</dl>
					</dd>
				</dl>
				<?php }?>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<button type="submit" class="btn btn-success radius" id="admin-role-save"><i class="icon-ok"></i> 确定</button>
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
	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}
	});
});
</script>