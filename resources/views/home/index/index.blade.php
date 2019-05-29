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
<article> 
  <!--banner begin-->
  <div class="picsbox"> 
  <div class="banner">
    <div id="banner" class="fader">
      @foreach($banner_data as $k => $v )
      <li class="slide" ><a href="/" target="_blank"><img src="/uploads/{{ $v->url }}"><span class="imginfo">{{ $v->title }}</span></a></li>
      <div class="fader_controls">
        <div class="page prev" data-target="prev">&lsaquo;</div>
        <div class="page next" data-target="next">&rsaquo;</div>
        <ul class="pager_list">
        </ul>
      </div>
      @endforeach
    </div>
  </div>
  <!--banner end-->
  <div class="toppic">
    @foreach($sperCate_top as $k => $v)
    <li> 
      <a href="/" target="_blank"> 
        <i><img src="/uploads/{{ $v->thumb }}"></i>
        <h2>{{ $v->desc }}</h2>
        <span>{{ $cates_cname_data[$v->cid] }}</span>
      </a>
    </li>
    @endforeach
  </div>
  </div>
  <div class="blank"></div>
  <!--blogsbox begin-->
  <div class="blogsbox">
    @foreach($articles_data as $k => $v)
    <div class="blogs" data-scroll-reveal="enter bottom over 1s" >
      <h3 class="blogtitle"><a href="/home/info/info?id={{ $v->id }}&tagname_id={{ $v->tid }}&cid={{ $v->cid }}" target="_blank">{{ $v->title }}</a></h3>
      <span class="blogpic"><a href="/home/info/info?id={{ $v->id }}&tagname_id={{ $v->tid }}&cid={{ $v->cid }}" title=""><img src="/uploads/{{ $v->thumb }}" alt=""></a></span>
      <p class="blogtext">{{ $v->desc }}</p>
      <div class="bloginfo">
        <ul>
          <li class="author"><a href="/">{{ $v->auth }}</a></li>
          <li class="lmname"><a href="/">{{ $cates_cname_data[$v->cid] }}</a></li>
          <li class="timer">{{ $v->ctime }}</li>
          <li class="view"><span>{{ $v->num }}</span>已阅读</li>
          <li class="like">{{ $v->goodnum }}</li>
        </ul>
      </div>
    </div>
    @endforeach
  </div>
  <!--blogsbox end-->
  <!-- sidebar 推荐侧边栏 开始 -->
  @include('home.public.sidebar')
  <!-- sidebar 推荐侧边栏 结束 -->
</article>
<footer>
<!-- 尾部 开始 -->
@include('home.public.footer')
<!-- 尾部 结束 -->
</footer>
<a href="#" class="cd-top">Top</a>
</body>
</html>
