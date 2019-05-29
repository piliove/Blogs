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
				<h3 class="title1">轮播图管理</h3>
				<!-- 搜索 开始 -->
				<div class="inline-form widget-shadow"> 
				<div class="form-body"> 
					<div data-example-id="simple-form-inline"> 
					<form class="form-inline"> 
						<div class="form-group"> 
						<input type="text" class="form-control" name="search" id="exampleInputEmail3" placeholder="轮播图" /> 
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
								    <th>轮播图标题</th>
								    <th>图片</th>
								    <th>状态</th>
								    <th>操作</th>
								</tr>
							</thead>
							<tbody>
              				@foreach($data as $k => $v)
							<tr>
									<th>{{ $v->id }}</th>
									<td>
										<p class="c1">{{ $v->title }}</p>
									</td>
									<td>
										<img src="/uploads/{{ $v->url }}" class="img-thumbnail" style="width:100px" />
									</td>
									<td>
										@if( $v->status == 0)
										<kbd>未激活</kbd>
										@else
										<kbd style="background-color:#019858;">激活</kbd>
										@endif
									</td>
									<td>
										<a href="javascript:;" onclick="del({{ $v->id }},this)" class="btn btn-danger">删除</a>
										<a href="/admin/banners/edit/{{ $v->id }}" class="btn btn-info">修改</a>
										@if( $v->status == 0 )
										<a href="javascript:;" onclick="changeState({{ $v->id }},1)" class="btn btn-success">激活</a>
										@else
										<a href="javascript:;" onclick="changeState({{ $v->id }},0)" class="btn btn-primary">禁止</a>
										@endif
									</td>
							</tr>
							@endforeach
							</tbody>
						</table>

						<!-- js脚本 开始 -->
						<script type="text/javascript">
							function changeState(id,sta)
							{
								if ( sta == 1 ) {
									$('#myModal form input[type=radio]').eq(0).attr('checked',true);
								} else {
									$('#myModal form input[type=radio]').eq(1).attr('checked',true);
								}
								// 赋值
								$('#myModal form input[type=hidden]').eq(0).val(id);

								$('#myModal').modal('show');
							} 
						</script>
						<!-- js脚本 结束 -->

						<!-- 模态框 开始 -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">更改 状态</h4>
									</div>
									<form action="/admin/banners/change" method="get">
										<div class="modal-body">
											<input type="hidden" name="id" value="">
											开启:<input type="radio" name="status" value="1" />
											&nbsp;&nbsp;&nbsp;&nbsp;
											未开启:<input type="radio" name="status" value="0" /><br><br>
											<button type="submit" class="btn btn-primary">保存</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- 模态框 结束 -->

					</div>
				<!-- 显示表格 结束 -->

				<!-- 显示页码 开始 -->
				
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
						// let token = $(obj).attr('token');
						
						// 弹出提示信息框
						if ( !window.confirm('您确定要删除吗?') ) {
								return false;
						}
						
						// ajax删除html dom节点
						$.get('/admin/banners/del',{id:id},function(res){
							if(res != 'err'){
								// 对a标签的父节点进行操作
								$(obj).parent().parent().remove();
							} else {
								alert('删除失败!');
							}
							},'html');
					}
				</script>
				<!-- script 脚本 开始 -->

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