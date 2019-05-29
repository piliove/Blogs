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
        <h3 class="title1">修改密码</h3>
        <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
            <div class="form-body">
                <form action="/admin/messages/update/{{ $data->id }}" method="post" > 
                    {{ csrf_field() }}	
                    <div class="form-group"> 
                        <label for="title">新密码</label> 
                        <input type="password" class="form-control" name="upass" value="" id="title" placeholder="请输入密码..." /> 
                    </div>
                    <div class="form-group"> 
                        <label for="auth">确认密码</label> 
                        <input type="password" class="form-control" name="reupass" value="" id="auth" placeholder="请输入密码..." /> 
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