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
       	<!-- 显示验证错误信息 开始 -->
				@if (count($errors) > 0)
						<div class="alert alert-danger">
								<ul>
										@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
										@endforeach
								</ul>
						</div>
				@endif
				<!-- 显示验证错误信息 结束 -->

				<!-- 表单 开始 -->
				<h3 class="title1">链接管理</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
					<div class="form-title"> 
						<h4>添加 链接 :</h4> 
					</div> 
					<div class="form-body"> 
						<form action="/admin/links/update/{{ $data->id }}" method="post" enctype="multipart/form-data"> 
							{{ csrf_field() }}	
							<div class="form-group"> 
								<label for="lname">链接名</label> 
								<input type="text" class="form-control" name="lname" value="{{ $data->lname }}" id="lname" placeholder="请输入链接名..." /> 
							</div>
                            <div class="form-group"> 
								<label for="url">链接url</label> 
								<input type="text" class="form-control" name="url" value="{{ $data->url }}" id="url" placeholder="请输入链接路径..." /> 
							</div>
							<button type="submit" class="btn btn-primary">提交</button>
							<button type="reset" class="btn btn-default">重置</button>
						</form> 
					</div> 
				</div>
				<!-- 表单 结束 -->
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