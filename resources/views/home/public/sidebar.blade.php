  <!-- sidebar 推荐侧边栏 开始 -->
  <div class="sidebar">
    <div class="zhuanti">
      <h2 class="hometitle">特别推荐</h2>
      @foreach($sperCate as $k => $v)
      <ul>
        <li> <i><img src="/uploads/{{ $v->thumb }}"></i>
          <p>{{ $v->title }}<span><a href="/home/info/info?id={{ $v->id }}&tagname_id={{ $v->tid }}&cid={{ $v->cid }}">阅读</a></span> </p>
        </li>
      </ul>
      @endforeach
    </div>
    <div class="tuijian">
      <h2 class="hometitle">推荐文章</h2>
      <ul class="tjpic">
        <i><img src="/uploads/{{ $sperCateOne->thumb }}"></i>
        <p><a href="/home/info/info?id={{ $sperCateOne->id }}&tagname_id={{ $sperCateOne->tid }}&cid={{ $sperCateOne->cid }}">{{ $sperCateOne->title }}</a></p>
      </ul>
      @foreach($articles_data_new as $k => $v)
      <ul class="sidenews">     
        <li> <i><img src="/uploads/{{ $v->thumb }}"></i>
          <p><a href="/home/info/info?id={{ $v->id }}&tagname_id={{ $v->tid }}&cid={{ $v->cid }}">{{ $v->title }}</a></p>
          <span>{{ $v->ctime }}</span> </li>
      </ul>
      @endforeach
    </div>
    <div class="tuijian">
      <h2 class="hometitle">点击排行</h2>
      <ul class="tjpic">
        <i><img src="/uploads/{{ $sperArtOne->thumb }}"></i>
        <p><a href="/home/info/info?id={{ $sperArtOne->id }}&tagname_id={{ $sperArtOne->tid }}&cid={{ $sperArtOne->cid }}">{{ $sperArtOne->title }}</a></p>
      </ul>
      <ul class="sidenews">
        @foreach($sperArt as $k => $v)
        <li> <i><img src="/uploads/{{ $v->thumb }}"></i>
          <p><a href="/home/info/info?id={{ $v->id }}&tagname_id={{ $v->tid }}&cid={{ $v->cid }}">{{ $v->title }}</a></p>
          <span>{{ $v->ctime }}</span> </li>
        @endforeach
      </ul>
    </div>
    <!-- 标签云 开始 -->
    <div class="cloud">
      <h2 class="hometitle">标签云</h2>
      <ul>
        @foreach($tagname_data as $k => $v)
        <a href="/home/list/list?tagname_id={{ $v->id }}" style="background:{{ $v->bgcolor }}">{{ $v->tagname }}</a>
        @endforeach
      </ul>
    </div>
    <!-- 标签云 结束 -->
    
    <div class="links">
      <h2 class="hometitle">友情链接</h2>
      <ul>
        @foreach($links_data as $k => $v)
        <li><a href="http://{{ $v->url }}" target="_blank">{{ $v->lname }}</a></li>
        @endforeach
      </ul>
    </div>
    <!-- 关注我们 开始 -->
    <div class="guanzhu" id="follow-us">
          <h2 class="hometitle">关注我的</h2>
          <ul>
            <li class="sina"><a href="/" target="_blank"><span>新浪微博</span>新浪博客</a></li>
            <li class="tencent"><a href="/" target="_blank"><span>腾讯微博</span>腾讯博客</a></li>
            <li class="qq"><a href="/" target="_blank"><span>QQ号</span>1529578681</a></li>
            <li class="email"><a href="/" target="_blank"><span>邮箱帐号</span>1529578681@qq.com</a></li>
            <li class="wxgzh"><a href="/" target="_blank"><span>微信号</span>188 2669 3921</a></li>
            <!-- <li class="wx"><img src="/home/images/wx.jpg"></li> -->
          </ul>
    </div>
    <!-- 关注我们 结束 -->
  </div>
  <!-- sidebar 推荐侧边栏 结束 -->