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
  <h1 class="t_nav"><span>您现在的位置是：<a href="/home/index/index">首页</a> > <a href="">个人中心</a> </span><a href="/" class="n1">网站首页</a><a href="" class="n2">个人中心</a></h1>
  <div class="infosbox">
    <div class="newsview">
      <h3 class="news_title">个人中心</h3>
      <div class="news_con">
      <h4 style="margin-top:20px;">用户信息*</h4>
      <hr>
      <div class="row">
        @if(session('home_login') == true)
        <div class="col-md-2" style="height:500px;margin-top:20px;">
          <div class="info2" style="margin:10px;">
            <b>头像 : </b>
            <img src="/uploads/{{ session('home_userinfo')->profile }}" style="width:100px;border:1px solid gray;">
          </div>
          <div class="info1" style="margin:10px;">
            <b>姓名 : </b>
            <b>{{ session('home_userinfo')->uname }}</b>
          </div>
          <div class="info3" style="margin:10px;">
            <b>邮箱 : </b>
            <b>{{ session('home_userinfo')->email }}</b>
          </div>
          <div class="info4" style="margin:10px;">
            <b>身份 : </b>
            @if(session('home_userinfo')->type == 1)
            <b>超级管理员</b>
            @else
            <b>普通用户</b>
            @endif
          </div>
          <div class="info5" style="margin:10px;">
            <b>创建时间 : </b>
            <b>{{ session('home_userinfo')->ctime }}</b>
          </div>
          <div class="info5" style="margin:10px;">
            <b>关注我的 : </b>
            <b>无</b>
          </div>
          <div class="info5" style="margin:10px;">
            <b>我的关注 : </b>
            <b>无</b>
          </div>
          <div class="info5" style="margin:10px;">
            <b>兴趣部落 : </b>
            <b>无</b>
          </div>
        </div>
        @else 
        <h3>暂无数据</h3><br>
        <a href="/home/login/login" style="color:blue;">请先登录</a>
        @endif
      </div>
      </div>

    </div>
    <div class="share" style="height:250px;">
      <p class="diggit"><a href="/home/users/edit/{{ session('home_userinfo')->id }}">去完善资料</a></p>
      <p class="dasbox"><a href="#" class="dashang" title="支持一下">赠献爱心</a></p>
    </div>
    </div>
    <!-- sidebar 开始 -->
    <!-- sidebar 结束 -->
</article>
<footer>
<!-- 尾部 开始 -->
@include('home.public.footer')
<!-- 尾部 结束 -->
</footer>
<a href="#" class="cd-top">Top</a>
</body>
</html>
