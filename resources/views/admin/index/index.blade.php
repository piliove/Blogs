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
			<div class="row-one">
					<div class="col-md-4 widget">
						<div class="stats-left ">
							<h5>Today</h5>
							<h4>用户日志</h4>
						</div>
						<div class="stats-right">
							<label>100</label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="col-md-4 widget states-mdl">
						<div class="stats-left">
							<h5>Today</h5>
							<h4>访问信息</h4>
						</div>
						<div class="stats-right">
							<label>100</label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="col-md-4 widget states-last">
						<div class="stats-left">
							<h5>Today</h5>
							<h4>浏览流量</h4>
						</div>
						<div class="stats-right">
							<label>100</label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="clearfix"> </div>	
				</div>

				<div class="row calender widget-shadow" >
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