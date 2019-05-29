<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>用户登录</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="网站关键词">
    <meta name="Description" content="网站介绍">
    <link rel="stylesheet" href="/home/login/css/base.css">
    <link rel="stylesheet" href="/home/login/css/iconfont.css">
    <link rel="stylesheet" href="/home/login/css/reg.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
</head>
<body>
<div id="ajax-hook"></div>
<div class="wrap">
    <div class="wpn">
        <div class="form-data pos">
            <div class="change-login">
                <p class="account_number on">账号登录</p>
                <!-- <p class="message">短信登录</p> -->
            </div>

            <!-- <form action="/home/login/dologin" method="post"> -->
            <div class="form1">
                {{ csrf_field() }}
                <p class="p-input pos">
                    <label for="num">用户名</label>
                    <input type="text" name="uname" id="num">
                    <span class="tel-warn num-err hide"><em>账号或密码错误，请重新输入</em><i class="icon-warn"></i></span>
                </p>
                <p class="p-input pos">
                    <label for="pass">请输入密码</label>
                    <!-- <input type="password" style="display:none"/> -->
                    <input type="password" name="upass" id="pass" autocomplete="new-password">
                    <span class="tel-warn pass-err hide"><em>账号或密码错误，请重新输入</em><i class="icon-warn"></i></span>
                </p>
            </div>
            <!-- <div class="form2 hide">
                <p class="p-input pos">
                    <label for="num2">手机号</label>
                    <input type="number" id="num2">
                    <span class="tel-warn num2-err hide"><em>账号或密码错误</em><i class="icon-warn"></i></span>
                </p>
                <p class="p-input pos">
                    <label for="veri-code">输入验证码</label>
                    <input type="number" id="veri-code">
                    <a href="javascript:;" class="send">发送验证码</a>
                    <span class="time hide"><em>120</em>s</span>
                    <span class="tel-warn error hide">验证码错误</span>
                </p>
            </div> -->
            <div class="r-forget cl">
                <a href="/home/register/register" class="z">账号注册</a>
                <a href="./getpass.html" class="y">忘记密码</a>
            </div>
            <button onclick="login()" class="lang-btn off log-btn">登录</button>
            <!-- </form> -->

            <div class="third-party">
                <a href="#" class="log-qq icon-qq-round"></a>
                <a href="#" class="log-qq icon-weixin"></a>
                <a href="#" class="log-qq icon-sina1"></a>
            </div>
            <p class="right">Powered by © 2019</p>
        </div>
    </div>
</div>
<script src="/home/login/js/jquery.js"></script>
<script src="/home/login/js/agree.js"></script>
<!-- <script src="/home/login/js/login.js"></script> -->

<!-- ajax脚本 开始 -->
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function login(){
        // 获取用户输入的用户名和密码
        let uname = $('.form1 input[name=uname]').eq(0).val();
        let upass = $('.form1 input[name=upass]').eq(0).val();

        // 发送ajax
        $.post('/home/login/dologin',{uname,upass},function(res){
            if (res.msg == 'err' ) {
                // 弹出失败提示
                layer.msg(res.info);
            } else {
                // 弹出成功提示
                layer.msg(res.info);

                // 跳转到首页
                window.location.href = '/';
            }
        },'json');
    }

</script>
<!-- ajax脚本 结束 -->

</body>
</html>