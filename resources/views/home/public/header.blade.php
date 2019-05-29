  <!--menu begin-->
  <div class="menu">
    <nav class="nav" id="topnav">
      <h1 class="logo"><a href="/home/index/index">PALME</a></h1>
      @foreach($cates_data as $k => $v)
      <li><a href="#">{{ $v->cname }}</a>
        <ul class="sub-nav">
            @foreach( $v->sub as $kk => $vv )
            <li><a href="/home/list/list?cid={{ $vv->id }}">{{ $vv->cname }}</a></li>
            @endforeach
        </ul>
      </li>
      @endforeach
      <!--search begin-->
      <div id="searchs" style="margin-right:50px;">
        
        <div id="search_bar" class="search_bar">
          @foreach($cates_data as $k => $v)
            @foreach( $v->sub as $kk => $vv )
            <form id="searchform" action="/home/list/search?cid={{ $vv->id }}" method="post">    
            @endforeach
          @endforeach
            {{ csrf_field() }}
            <input class="input" placeholder="搜索..." type="text" name="search" value="" id="keyboard">
            <!-- <input type="hidden" name="search" value="" /> -->
            <!-- <input type="hidden" name="" value="" /> -->
            <!-- <input type="hidden" name="" value=""> -->
            <!-- <input type="submit" name="submit" value=""/> -->
            <span class="search_ico"></span>
          </form>
        </div>
      </div>
      <!--search end-->
      <!--login start-->
      <div class="logins" style="position:relative;right:-730px;">
        @if(session('home_login') == false)
        <a href="/home/login/login" style="color:#fff;">登录</a>&nbsp;
        <a href="javascript:;" onclick="register()" style="color:#fff;">注册</a>
        @else
        <a href="/home/users/index" style="color:#fff;">{{ session('home_userinfo')->uname }}</a>
        <a href="/home/login/logout" onclick="logout()" style="color:#fff;">退出</a>
        @endif  
      </div>
      <!--login end-->
    </nav>
  </div>
  <!--menu end--> 

<!-- 引入layerui文件 css -->
<link rel="stylesheet" href="/layui-v2.4.5/layui/css/layui.css">
<!-- 引入layerui文件 js -->
<script src="/layui-v2.4.5/layui/layui.js"></script>
<script>
//一般直接写在一个js文件中
layui.use(['layer', 'form'], function(){
var layer = layui.layer;

});
</script> 
<!-- ajax处理 开始 -->
<script type="text/javascript">
  function register(){
    //iframe层-父子操作
    layer.open({
      type: 2,
      title: '注册',
      area: ['700px', '450px'],
      fixed: false, //不固定
      maxmin: true,
      content: '/home/register/index'
    });
  }
</script>
<!-- ajax处理 结束 -->