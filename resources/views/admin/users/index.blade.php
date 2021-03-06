<!DOCTYPE HTML>
<html>
<head>
<!-- 头部 开始 -->
@include('admin.public.header')
<!-- 头部 结束 -->
</head> 
<body class="cbp-spmenu-push">
    <!-- 主页面内容 开始 -->
	<div class="main-content">
		<!-- sidebar侧边栏 开始 -->
		@include('admin.public.sidebar')
		<!-- sidebar侧边栏 结束 -->
		<!-- 头部信息 开始 -->
		@include('admin.public.header_info')
		<!-- 头部信息 结束 -->
        
		<!-- 主体内容 开始 -->
		<div id="page-wrapper">
			<div class="main-page">
				<!-- 导入 提示信息 开始 -->
				@include('admin.public.message')
				<!-- 导入 提示信息 开始 -->
				
				<!-- 显示表格 开始 -->
				<h3 class="title1">用户管理</h3>
				<!-- 搜索 开始 -->
				<div class="inline-form widget-shadow"> 
				<div class="form-body"> 
					<div data-example-id="simple-form-inline"> 
					<form class="form-inline"> 
						<div class="form-group"> 
						<input type="text" class="form-control" name="search" id="exampleInputEmail3" placeholder="用户名" /> 
						</div> 
						<button type="submit" class="btn btn-success">搜索</button> 
					</form> 
					</div> 
				</div> 
				</div>
				<!-- 搜索 结束 -->
				<div class="panel-body widget-shadow">
						<table class="table">
							<thead>
								<tr>
								  <th>ID</th>
								  <th>用户名</th>
								  <th>邮箱</th>
									<th>头像</th>
									<th>状态</th>
									<th>创建时间</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $k => $v)
								<tr>
								  <th scope="row">{{ $v->id }}</th>
								  <td>{{ $v->uname }}</td>
								  <td>{{ $v->email }}</td>
									<td>
										<img src="/uploads/{{ $v->profile }}" class="img-thumbnail" style="width:70px;">
									</td>
									<td>
										@if($v->status == 0)
										<kbd>未激活</kbd>
										@else
										<kbd style="background-color:	#3CB371;">已激活</kbd>
										@endif
									</td>
									<td>{{ $v->ctime }}</td>
									<td>
											<a href="javascript:;" token="{{ $v->token }}" onclick="del({{ $v->id }},this)" class="btn btn-danger">删除</a>
											<a href="/admin/users/edit/{{ $v->id }}/{{ $v->token }}" class="btn btn-info">修改</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				<!-- 显示表格 结束 -->

				<!-- 显示页码 开始 -->
				{{ $data->appends(['search'=>$search])->links() }}
				<!-- 显示页码 结束 -->

				<!-- 统计日历页 -->
				<div class="row"></div>
				<div class="row"></div>
				<div class="row calender widget-shadow" style="display:none;">
					<h4 class="title">Calender</h4>
					<div class="cal1">
					</div>
				</div>
				
			</div>
		</div>
		<!-- 主体内容 结束 -->
		
		<!-- script 脚本 开始 -->
		<script>
				function del(id,obj)
				{
					// 添加token属性
					let token = $(obj).attr('token');
					
					// 弹出提示信息框
					if ( !window.confirm('您确定要删除吗?') ) {
							return false;
					}
					
					// ajax删除html dom节点
					$.get('/admin/users/dels',{id:id,token:token},function(res){
						if(res != 'err'){
							// 对a标签的父节点进行操作
							$(obj).parent().parent().remove();
						} else {
							alert('删除失败!');
						}
					},'html');
				}
		</script>
		<!-- script 脚本 结束 -->

		<!-- 尾部 开始 -->
		@include('admin.public.footer')
        <!-- 尾部 结束 -->
    </div>
    <!-- 主页面内容 结束 -->

	<!-- 页脚静态资源 开始 -->
	@include('admin.public.footer_static')
	<!-- 页脚静态资源 开始 -->
</body>
</html>