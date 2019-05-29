<!doctype html>
<html>
<head>
<!-- 字符集 开始 -->
@include('home.public.meta')
<!-- 字符集 结束 -->
</head>
<body>
<header> 
<!-- 头部菜单 开始 -->
@include('home.public.header')
<!-- 头部菜单 结束 -->
</header>
<div class="pagebg sh"></div>
<div class="container">
  @foreach($onecate as $k =>$v)
  <h1 class="t_nav"><span>您现在的位置是：<a href="/home/index/index">首页</a> > <a href="javascript:;">{{ $v->cname }}</a> </span><a href="/home/index/index" class="n1">网站首页</a><a href="/" class="n2">{{ $v->cname }}</a></h1>
  @endforeach
  <!--blogsbox begin-->
  <div class="blogsbox">
    @foreach( $list_data as $k => $v )
    <div class="blogs" data-scroll-reveal="enter bottom over 1s" >
      <h3 class="blogtitle"><a href="/home/info/info?id={{ $v->id }}&cid={{ $v->cid }}&tagname_id={{ $v->tid }}" target="_blank">{{ $v->title }}</a></h3>
      <span class="blogpic"><a href="/home/info/info?id={{ $v->id }}&cid={{ $v->cid }}&tagname_id={{ $v->tid }}" title=""><img src="/uploads/{{ $v->thumb }}" alt=""></a></span>
      <p class="blogtext">{{ $v->desc }}</p>
      <div class="bloginfo">
        <ul>
          <li class="author"><a href="javascript:;">{{ $v->auth }}</a></li>
          <li class="lmname"><a href="javascript:;">{{ $cates_cname_data[$v->cid] }}</a></li>
          <li class="timer">{{ $v->ctime }}</li>
          <li class="view"><span>{{ $v->num }}</span>已阅读</li>
          <li class="like">{{ $v->goodnum }}</li>
        </ul>
      </div>
    </div>
    @endforeach
    <!-- 显示页码 开始 -->
    {{$list_data->appends(['search'=>$search])->links('common.paginator')}}
    <!-- 显示页码 结束 -->
    
  </div>
  <!--blogsbox end-->
  <!-- sidebar 推荐侧边栏 开始 -->
  @include('home.public.sidebar')
  <!-- sidebar 推荐侧边栏 结束 -->
</div>
<footer>
<!-- 尾部 开始 -->
@include('home.public.footer')
<!-- 尾部 结束 -->
</footer>
<a href="#" class="cd-top">Top</a>
</body>
</html>
