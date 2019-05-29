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
				<h3 class="title1">栏目管理</h3>
				<!-- 搜索 开始 -->
				<div class="inline-form widget-shadow"> 
				<div class="form-body"> 
					<div data-example-id="simple-form-inline"> 
					<form class="form-inline"> 
						<div class="form-group"> 
						<input type="text" class="form-control" name="search" id="exampleInputEmail3" placeholder="栏目名" /> 
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
									<th>栏目名</th>
									<th>所属栏目</th>
									<th>栏目路径</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $k => $v)
								<tr>
									<th>{{ $v->id }}</th>
									<td>
										@if($v->pid == 0)
										<span style="font-weight:bold;">{{ $v->cname }}</span>
										@else
											<p>{{ $v->cname }}</p>
										@endif
									</td>
									<td>
										@if( $v->pid == 0 )
										<p>顶级栏目</p>
										@else
										<p>二级栏目</p>
										@endif
									</td>
									<td>{{ $v->path }}</td>
									<td width="300px">
										<a href="#" pid="{{ $v->pid }}" onclick="del({{ $v->id }},this)" class="btn btn-danger" >删除</a>
										<a href="#" onclick="update()" class="btn btn-info" >修改</a>
										@if( $v->pid == 0 )
											<a href="/admin/cates/create/{{ $v->id }}" class="btn btn-info">添加子栏目</a>
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>

				<!-- js脚本 结束 -->
				<script type="text/javascript">
					function update(){
						alert('不能对栏目进行修改!');
					}
				</script>
				<script type="text/javascript">
					function del(id,obj)
					{
						// 添加pid属性
						let pid = $(obj).attr('pid');

						// 弹出提示信息框
						if ( !window.confirm('您确定要删除吗?') ) {
								return false;
						}
						
						// ajax删除html dom节点
						$.get('/admin/cates/del',{id,pid},function(res){
							if(res.msg != 'err'){
								// 对a标签的父节点进行操作
								$(obj).parent().parent().remove();
								alert(res.info);
							} else {
								alert(res.info);
							}
						},'json');
					}
				</script>
				<!-- js脚本 开始 -->
				
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