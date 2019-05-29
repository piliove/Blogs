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
			<!-- 导入 提示信息 开始 -->
			@include('admin.public.message')
			<!-- 导入 提示信息 开始 -->
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
				<h3 class="title1">轮播图管理</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
					<div class="form-title"> 
						<h4>修改 轮播图 :</h4> 
					</div> 
					<div class="form-body"> 
						<form action="/admin/banners/update/{{ $banner_data->id }}" method="post" enctype="multipart/form-data"> 
							{{ csrf_field() }}	
              <div class="form-group"> 
							<label for="title">轮播图标题</label> 
							<input type="text" class="form-control" name="title" value="{{ $banner_data->title }}" id="title" /> 
							</div> 
							<div class="form-group"> 
							<label for="desc">轮播图描述</label> 
							<input type="text" class="form-control" name="desc" value="{{ $banner_data->desc }}" id="desc" /> 
							</div>         
              <div class="form-group"> 
							<label for="url">轮播图URL</label> 
							<input type="file" name="url" class="form-control">
              <img src="/uploads/{{ $banner_data->url }}" style="width:100px;">
							</div>
              <div class="form-group"> 
							<label for="status">轮播图状态</label><br>
							未开启:<input type="radio" name="status" value="0" {{ $banner_data->status==0 ? 'checked' : '' }} />
              &nbsp;&nbsp;&nbsp;&nbsp;
              开启:<input type="radio" name="status" value="1"  {{ $banner_data->status==1 ? 'checked' : '' }} />
							</div> 
							<button type="submit" class="btn btn-primary">提交</button>
							<button type="reset" class="btn btn-default">重置</button>
              <input type="hidden" name="url_path" value="{{ $banner_data->url }}">
              </form>
					</div> 
				</div>
				<!-- 表单 结束 -->
				<div class="row">	
				</div>
				<div class="row">
				</div>
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