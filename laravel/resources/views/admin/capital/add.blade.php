@extends('common.admin.public')
@section('title', '红包批次')
@section('content')
<section class="Hui-article-box">
	<nav class="breadcrumb">
		<i class="Hui-iconfont">&#xe67f;</i> 首页 
		<span class="c-gray en">&gt;</span> 资金管理 
		<span class="c-gray en">&gt;</span> 批次申请
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<article class="page-container">
	<form class="form form-horizontal" id="form-article-add" method="post" action="add">
		<div class="row cl">
			{{ csrf_field() }}
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>批次名称：</label>
			<div class="formControls col-xs-4 col-sm-2">
				<input type="text" class="input-text" value="" placeholder="" id="" name="numberName">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>批次总额：</label>
			<div class="formControls col-xs-4 col-sm-2">
				<input type="text" class="input-text" value="" placeholder="" id="" name="numberPrice">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>资金用途：</label>
			<div class="formControls col-xs-5 col-sm-3">
				<textarea name="reason" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,200)"></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>申请部门：</label>
			<div class="formControls col-xs-4 col-sm-2"> <span class="select-box">
				<select name="department" class="select">
					<option value="1">请选择</option>
					<option value="开发">开发</option>
					<option value="测试">测试</option>
				</select>
				</span> </div>
		</div>
		<!-- {{ request()->cookie('uid') }} -->
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>
				<button class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</article>
@endsection
@section('js')
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{ URL::asset('lib/My97DatePicker/4.8/WdatePicker.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('lib/jquery.validation/1.14.0/jquery.validate.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('lib/jquery.validation/1.14.0/validate-methods.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('lib/jquery.validation/1.14.0/messages_zh.js') }}"></script>   
<script type="text/javascript" src="{{ URL::asset('lib/webuploader/0.1.5/webuploader.min.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('lib/ueditor/1.4.3/ueditor.config.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('lib/ueditor/1.4.3/ueditor.all.min.js') }}"> </script> 
<script type="text/javascript" src="{{ URL::asset('lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js') }}"></script>
<!--/请在上方写此页面业务相关的脚本-->
@endsection
