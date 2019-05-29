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
				<h3 class="title1">友情链接管理</h3>
				<!-- 搜索 开始 -->
				<div class="inline-form widget-shadow"> 
				<div class="form-body"> 
					<div data-example-id="simple-form-inline"> 
					<form class="form-inline"> 
						<div class="form-group"> 
						<input type="text" class="form-control" name="search" id="exampleInputEmail3" placeholder="友情链接名" /> 
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
                                    <th>链接名称</th>
                                    <th>链接url</th>
                                    <th>操作</th>
								</tr>
							</thead>
							<tbody>
                                @foreach($links_data as $k => $v )
                                <tr>
                                    <th>{{ $v->id }}</th>
                                    <td>{{ $v->lname }}</td>
                                    <td>{{ $v->url }}</td>
                                    <th>
                                        <a href="javascript:;" onclick="only({{ $v->id }})" class="btn btn-danger">删除</a>
                                        <a href="/admin/links/edit/{{ $v->id }}" class="btn btn-info">修改</a>
                                    </th>
                                </tr>
                                @endforeach
							</tbody>    
						</table>
					</div>
				<!-- 显示表格 结束 -->

				<!-- js脚本 开始 -->
                <script type="text/javascript">
                    function only(id){
                        $.get('/admin/links/del',{id:id},function(res){
                            console.log(res);
                        },'html');
                    }
                    
                </script>
				<!-- js脚本 结束 -->

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