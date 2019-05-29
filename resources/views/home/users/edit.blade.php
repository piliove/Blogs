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
  <h1 class="t_nav"><span>您现在的位置是：<a href="/home/index/index">首页</a> > <a href="">个人中心</a> </span><a href="/home/index/index" class="n1">网站首页</a><a href="/home/users/index" class="n2">个人中心</a></h1>
  <div class="infosbox">
    <div class="newsview">
      <h3 class="news_title">个人中心</h3>
      <div class="news_con">
      <h4 style="margin-top:20px;">用户信息*</h4>
      <hr>
      <div class="row" style="height:500px;">
        @if(session('home_login') == true)
        <form action="/home/users/update" method="post">
          <input type="hidden" name="id" value="{{ session('home_userinfo')->id }}" />
          {{ csrf_field() }}
          <div class="col-md-2" style="height:500px;margin-top:20px;">
            <div class="info2" style="margin:10px;">
              <b>头像 : </b>
              <img src="/uploads/{{ session('home_userinfo')->profile }}" style="width:100px;border:1px solid gray;">
              <input type="file" name="profile" value="" />
            </div>
            <div class="info1" style="margin:10px;">
              <b>姓名 : </b>
              <input type="text" name="uname" value="{{ session('home_userinfo')->uname }}" />
            </div>
            <div class="info3" style="margin:10px;">
              <b>邮箱 : </b>
              <input type="text" name="email" value="{{ session('home_userinfo')->email }}" />
            </div>
            <div class="info4" style="margin:10px;">
              <b>身份 : </b>
              @if(session('home_userinfo')->type == 1)
              <b style="cursor:pointer" name="type" onclick="myFunction()">超级管理员</b>
              @else
              <b style="cursor:pointer" name="type" onclick="myFunction()">普通用户</b>
              @endif
            </div>
            <div class="info5" style="margin:10px;">
              <b>创建时间 : </b>
              <b style="cursor:pointer" name="ctime" onclick="myFunctions()">{{ session('home_userinfo')->ctime }}</b>
            </div>
            
          </div>
          
          @else 
          <h3>暂无数据</h3><br>
          <a href="/home/login/login" style="color:blue;">请先登录</a>
          @endif
          </div>

          </div>
          <div class="share" style="margin-top:-250px;margin-bottom:50px;margin-left:50px;">
            <input type="submit" class="btn btn-info" value="修改" style="padding:5px;">
            <button class="btn btn-info" style="padding:5px;"><a href="/home/users/index">返回</a></button>
          </div>
        </form>

    </div>
    
</article>

<footer>
<!-- 尾部 开始 -->
@include('home.public.footer')
<!-- 尾部 结束 -->
</footer>
<a href="#" class="cd-top">Top</a>
</body>
<script type="text/javascript">
    function myFunction(){
        alert("不能修改用户身份");
    }
    function myFunctions(){
        alert("不能修改创建时间");
    }
</script>
</html>
