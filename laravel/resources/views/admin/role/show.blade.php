@extends('common.admin.public')
@section('title', '角色管理')
@section('content')
<section class="Hui-article-box">
	<nav class="breadcrumb">
		<i class="Hui-iconfont">&#xe67f;</i> 首页 
		<span class="c-gray en">&gt;</span> 角色管理 
		<span class="c-gray en">&gt;</span> 全部角色 
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l"> <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="role_add('添加角色','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加角色</a> </span>
				<span class="r">共有数据：<strong>54</strong> 条</span>
			</div>
			<div class="mt-20">
				<table class="table table-border table-bordered table-bg table-hover table-sort">
					<thead>
						<tr class="text-c">
							<th width="25"><input type="checkbox" name="" value=""></th>
							<th width="50">ID</th>
							<th width="80">角色名</th>
							<th width="80">用户列表</th>
							<th width="120">权限列表</th>
							<th width="120">描述</th>
							<th width="40">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data as $v): ?>
						<tr class="text-c">
							<td><input type="checkbox" value="" name=""></td>
							<td>{{ $v['role_id'] }}</td>
							<td>{{ $v['role_name'] }}</td>
							<td>{{ $v['users'] }}</td>
							<td>{{ $v['node_name'] }}</td>
							<td>{{ $v['role_content'] }}</td>
							<td class="f-14 td-manage"><a style="text-decoration:none" onClick="auth_btn(this)" href="javascript:;" title="修改"><i class="Hui-iconfont">&#xe6de;</i></a>
								<a style="text-decoration:none" class="ml-5" onClick="article_edit('资讯编辑','article-add.html','10001')" href="javascript:;" title="重新赋权"><i class="Hui-iconfont">&#xe6df;</i></a>
								<a style="text-decoration:none" class="ml-5" onClick="auth_del(this)" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</article>
	</div>
</section>
@endsection
@section('js')
<script type="text/javascript" src="{{ URL::asset('lib/My97DatePicker/4.8/WdatePicker.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('lib/datatables/1.10.0/jquery.dataTables.min.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('lib/laypage/1.2/laypage.js') }}"></script> 
<script type="text/javascript">
url = "{{url('admin/role/add')}}"
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "asc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
		//{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		{"orderable":false,"aTargets":[0]}// 不参与排序的列
	]
});

/*角色-添加*/
function role_add(title,w,h){
	layer_show(title,url,w,h);
}
/*权限-删除*/
function auth_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: 'upd',
			dataType: 'json',
			data:{
				"id":id,
				"_token":"{{csrf_token()}}"
			},
			success: function(data){
				if(data.code==200){
					$(obj).parents("tr").remove();
					layer.msg('已删除!',{icon:1,time:1000});
				}else{
					layer.msg('删除失败!',{icon:1,time:1000});
				}
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
/*权限-停用*/
function auth_btn(obj,id,status){
	$.ajax({
		type: 'POST',
		url: 'upds',
		dataType: 'json',
		data:{
			"id":id,
			"status":status,
			"_token":"{{csrf_token()}}"
		},
		success: function(data){
			if(status==1){
				a = '未启用';
			}else{
				a='已启用';
			}
			if(data.code==200){
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">'+a+'</span>');			
			}else{
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">'+a+'</span>');	
			}
		},
		error:function(data) {
			console.log(data.msg);
		},
	});		
}
</script> 
@endsection