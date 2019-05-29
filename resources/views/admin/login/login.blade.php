<!DOCTYPE HTML>
<html>
<head>
<!-- 头部 开始 -->
@include('admin.public.header')
<!-- 头部 结束 -->
</head>
<body>
<!-- 登录页 开始 -->
<div id="page-wrapper" style="min-height: 100px;">
	<div class="main-page login-page ">
		<h3 class="title1">登 录</h3>
		<div class="widget-shadow">
			<div class="login-top">
				<h4>欢迎来到 派菈蒙 AdminPanel ! <br> 不是 会员? <a href="signup.html">  注册 »</a> </h4>
			</div>
			<div class="login-body">
				<form action="/admin/login/dologin" method="post">
					{{ csrf_field() }}
					<input type="text" name="uname" class="user" placeholder="请输入您的账号" required="">
					<input type="password" name="upass" class="lock" placeholder="密码">
					<input type="submit" value="登 录">
					<div class="forgot-grid">
						<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>记住 该选项</label>
						<div class="forgot">
							<a href="#">忘记密码?</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>
		</div>
		
		<div class="login-page-bottom">
			<h5> - 或者 -</h5>
			<div class="social-btn"><a href="#"><i class="fa fa-facebook"></i><i>Sign In with Facebook</i></a></div>
			<div class="social-btn sb-two"><a href="#"><i class="fa fa-twitter"></i><i>Sign In with Twitter</i></a></div>
		</div>
	</div>
</div>
<!-- 登录页 结束 -->

<!-- 尾部 开始 -->
@include('admin.public.footer')
<!-- 尾部 结束 -->

<!-- 主页面内容 结束 -->

<!-- 页脚静态资源 开始 -->
@include('admin.public.footer_static')
<!-- 页脚静态资源 开始 -->

</body>
</html>