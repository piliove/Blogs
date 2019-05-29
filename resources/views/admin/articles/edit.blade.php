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
				<h3 class="title1">文章管理</h3>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
					<div class="form-title"> 
						<h4>修改 文章 :</h4> 
					</div> 
					<div class="form-body"> 
						<form action="/admin/articles/update/{{ $data->id }}" method="post" enctype="multipart/form-data"> 
							{{ csrf_field() }}	
							<div class="form-group"> 
								<label for="title">标题</label> 
								<input type="text" class="form-control" name="title" value="{{ $data->title }}" id="title" placeholder="请输入文章标题..." /> 
							</div>
                            <div class="form-group"> 
								<label for="auth">作者</label> 
								<input type="text" class="form-control" name="auth" value="{{ $data->auth }}" id="auth" placeholder="请输入文章作者..." /> 
							</div>
                            <div class="form-group"> 
								<label for="desc">描述</label> 
								<input type="text" class="form-control" name="desc" value="{{ $data->desc }}" id="desc" placeholder="请输入文章描述..." /> 
							</div>
                            <div class="form-group"> 
								<label for="tid">标签云</label> 
								<select class="form-control" name="tid" id="tid">
                                    @foreach($datas as $k => $v)
                                    <option value="{{ $temp_tag[$v->tid] }}">--{{ $temp_tag[$v->tid] }}--</option>
                                    @endforeach
                                </select>
							</div>
                            <div class="form-group"> 
								<label for="cid">所属栏目</label> 
								<select class="form-control" name="cid" id="cid">
                                    @foreach($cate_data as $k => $v)
                                        @if( $v->pid == 0 )
                                        <option value="{{ $v->id }}" disabled style="font-weight:bold;">{{ $v->cname }}</option>
                                        @else
                                        <option value="{{ $v->id }}" selected>{{ $v->cname }}</option>
                                        @endif
                                    @endforeach
                                </select>
							</div>
                            <div class="form-group"> 
								<label for="title">缩略图</label><br>
                                <img src="/uploads/{{ $data->thumb }}" style="width:80px;" class="img-thumbnail" />
								<input type="file" class="form-control" name="thumb" id="thumb"/>
								<input type="hidden" name="thumb_path" value="{{ $data->thumb }}" />
							</div>
                            <div class="form-group"> 
							<label for="title">文章内容</label> 
                            <!-- 加载编辑器的容器 -->
                            <script id="content" name="content" type="text/plain" style="min-height:300px;">{!! $data->content !!}</script>                       
                            </div>
                            <!-- 百度富文本编辑器 -->
                            <!-- 配置文件 -->
                            <script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
                            <!-- 编辑器源码文件 -->
                            <script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
                            <!-- 实例化编辑器 -->
                            <script type="text/javascript">
                                    var ue = UE.getEditor('content',{
                                        toolbars: [
                                                    ['simpleupload','emotion','fullscreen','indent','preview','spechars', 'source', 'undo', 'redo', 'bold']
                                                ]
                                    });
                            </script>

							<button type="submit" class="btn btn-primary">修改</button>
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