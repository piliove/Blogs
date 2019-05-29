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
				
				<!-- 个人信息 开始 -->
				<div class="main-page signup-page">
				<h3 class="title1">个人中心</h3>
				<p class="creating">希望你能在这里找到有用的信息.</p>
				<div class="sign-up-row widget-shadow">
					<h5>个人 信息 :</h5>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>头像* :</h4>
						</div>
						<div class="sign-up2">
							<img src="/uploads/{{ session('admin_userinfo')->profile }}" style="width:60px;border:1px solid gray;">
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>名称* :<a style="margin-left:100px;">{{ session('admin_userinfo')->uname}}</a></h4>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>邮箱* :<a style="margin-left:100px;">{{ session('admin_userinfo')->email }}</a></h4>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>身份* :<a style="margin-left:100px;">{{ session('admin_userinfo')->type == 1 ? '超级管理员' : '普通会员' }}</a></h4>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="clearfix"> </div>
					</div>
					<div class="sub_home">
						<form action="/admin/messages/double/{{ session('admin_userinfo')->id }}">
							<input type="submit" value="查看详情">
						</form>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!-- 个人信息 结束 -->

				<!-- 显示页码 开始 -->
				
				<!-- 显示页码 结束 -->

				<!-- 统计日历页 -->
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