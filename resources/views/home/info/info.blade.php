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
</header>
<article>
  <h1 class="t_nav"><span>您现在的位置是：<a href="/home/index/index">首页</a> > <a href="/home/list/list?cid={{ $art_data->cid }}">{{ $cname->cname }}</a> > <a href="">{{ $tagnames_data->tagname }}</a></span><a href="/" class="n1">网站首页</a><a href="/" class="n2">{{ $tagnames_data->tagname }}</a></h1>
  <div class="infosbox">
    <div class="newsview">
      <h3 class="news_title">{{ $art_data->title }}</h3>
      <div class="bloginfo">
        <ul>
          <li class="author"><a href="javascript:;">{{ $art_data->auth }}</a></li>
          <li class="lmname"><a href="javascript:;">{{ $cname->cname }}</a></li>
          <li class="timer">{{ $art_data->ctime }}</li>
          <li class="view">{{ $art_data->num }}已阅读</li>
          <li class="like">{{ $art_data->goodnum }}</li>
        </ul>
      </div>
      <div class="tags">
        @foreach($tagname_data as $k => $v)
        <a href="/home/list/list?tagname_id={{ $v->id }}" target="_blank">{{ $v->tagname }}</a>
        @endforeach
      </div>
      <div class="news_about"><strong>简介</strong>{{ $art_data->desc }}</div>
      <div class="news_con">{!! $art_data->content !!}</div>
    </div>
    <div class="share">
      <p class="diggit"><a href="javascript:;" onclick="goodnum({{ $art_data->id }})"> 很赞哦！ </a>(<b>{{ $art_data->goodnum }}</b>)</p>
        <!-- js 脚本文件 开始 -->
        <script type="text/javascript">
          function goodnum(id){
            // 点赞
            $.get('/home/info/goodnum',{id},function(res){
              if ( res.msg != 'err' ) {
                layer.msg(res.info);

                // 修改页面dom元素
                let like = $('.like').first();
                like.html( parseInt(like.html()) +1 ); 
              } else {
                layer.msg(res.info);            
              }
            },'json');
          }
        </script>
        <!-- js 脚本文件 结束 -->
      <p class="dasbox"><a href="javascript:void(0)" onClick="dashangToggle()" class="dashang" title="打赏，支持一下">打赏本站</a></p>
      <div class="hide_box"></div>
      <div class="shang_box"> <a class="shang_close" href="javascript:void(0)" onclick="dashangToggle()" title="关闭">关闭</a>
        <div class="shang_tit">
          <p>感谢您的支持，我会继续努力的!</p>
        </div>
        <div class="shang_payimg"> <img src="/home/images/alipayimg.jpg" alt="扫码支持" title="扫一扫"> </div>
        <div class="pay_explain">扫码打赏，你说多少就多少</div>
        <div class="shang_payselect">
          <div class="pay_item checked" data-id="alipay"> <span class="radiobox"></span> <span class="pay_logo"><img src="/home/images/alipay.jpg" alt="支付宝"></span> </div>
          <div class="pay_item" data-id="weipay"> <span class="radiobox"></span> <span class="pay_logo"><img src="/home/images/wechat.jpg" alt="微信"></span> </div>
        </div>
        <script type="text/javascript">
        $(function(){
          $(".pay_item").click(function(){
            $(this).addClass('checked').siblings('.pay_item').removeClass('checked');
            var dataid=$(this).attr('data-id');
            $(".shang_payimg img").attr("src","images/"+dataid+"img.jpg");
            $("#shang_pay_txt").text(dataid=="alipay"?"支付宝":"微信");
          });
        });
        function dashangToggle(){
          $(".hide_box").fadeToggle();
          $(".shang_box").fadeToggle();
        }
      </script> 
      </div>
    </div>
    <div class="nextinfo">
      
      <p>下一篇：
        @if($article_prev)
        <a href="/home/info/info?id={{ $article_prev->id }}&cid={{ $article_prev->cid }}&tagname_id={{ $article_prev->tid }}">{{ $article_prev->title }}</a>
        @endif
      </p> 
      <p>上一篇：
        @if($article_next)
        <a href="/home/info/info?id={{ $article_next->id }}&cid={{ $article_next->cid }}&tagname_id={{ $article_next->tid }}">{{ $article_next->title }}</a>
        @endif
      </p> 

    </div>
    <div class="otherlink">
      <h2>相关文章</h2>
      <ul>
        @foreach($art_cate_data as $k => $v)
        <li><a href="/home/info/info?id={{ $v->id }}&cid={{ $v->cid }}&tagname_id={{ $v->tid }}" title="{{ $v->title }}">{{ $v->title }}</a></li>
        @endforeach
      </ul>
    </div>
    <div class="news_pl">
      <h2>文章评论</h2>
      <ul>
        @if($tips_data)
        @foreach($tips_data as $k => $v)  
        <div class="gbko" style="width:700px;height:200px;border-radius:5px;border:2px solid gray;background-color:#fff;margin:20px auto;position:relative;">
          <div class="gbko_nex" style="width:720px;height:40px;border-bottom:1px solid black;margin:-10px;position:absolute;">
            <div class="pname" style="width:100px;height:100%;float:left;">
              <div style="margin:10px 25px;">{{ $v->uname }}</div>
            </div>
            <div class="lou" style="width:100px;height:100%;float:right;">
              <div style="margin:10px 25px;">第 <b>{{ $n++ }}</b> 楼</div>
            </div>
          </div>
          <br>
          
          <div class="texts" style="width:700px;height:150px;border-radius:5px;border:1px solid black;margin:30px auto;position:relative;">
            <div class="content" style="width:100%;height:130px;" >{!! $v->content !!}</div>
            <b style="float:right;width:200px;height:20px;">发布时间:{{ $v->ctime }}&nbsp;</b>
          </div>
        </div>
        @endforeach
        @endif
        <div class="sends" style="width:720px;height:200px;margin:20px auto;">
          <form action="/home/info/sends?id={{ $art_data->id }}&cid={{ $art_data->cid }}&tagname_id={{ $art_data->tid }}" method="post">
            {{ csrf_field() }}
            <!-- 加载编辑器的容器 -->
            <script id="content" name="content" type="text/plain" style="min-height:150px;"></script>
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
            <button type="submit" style="float:right;margin-top:5px;margin-right:5px;padding:5px;border:1px solid skyblue;border-radius:5px;background-color:skyblue;cursor:pointer;">提交</button>
          </form>
        </div>
      </ul>
    </div>
  </div>

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
