<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <!-- 引入bootstrap css文件 -->
        <link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- 引入jquery -->
        <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
        <!-- 引入bootstrap js -->
        <script src="https://cdn.bootcss.com/twitter-bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- 引入layerui文件 css -->
        <!-- <link rel="stylesheet" href="/layui-v2.4.5/layui/css/layui.css"> -->
        <!-- 引入layerui文件 js -->
        <!-- <script src="/layui-v2.4.5/layui/layui.js"></script> -->
        <!-- <script> -->
        <!-- // 一般直接写在一个js文件中 -->
        <!-- layui.use(['layer', 'form'], function(){
        var layer = layui.layer;

        }); -->
        <!-- </script>  --> 
    </head>
    <body>
        <div class="container">

            <form action="/home/register/store" method="post">
                {{ csrf_field() }}  
                <div class="form-group">
                    <label for="unames">用户名</label>
                    <input type="text" name="uname" class="form-control" id="unames" placeholder="用户名">
                </div>
                <div class="form-group">
                    <label for="upasss">密码</label>
                    <input type="password" name="upass" class="form-control" id="upasss" placeholder="密码">
                </div>
                <div class="form-group">
                    <label for="reupass">确认密码</label>
                    <input type="password" name="reupass" class="form-control" id="reupasss" placeholder="确认密码">
                </div>
                <div class="form-group">
                    <label for="code">验证码</label><br>
                    <input type="password" class="form-control" name="code" id="codes" placeholder="验证码" style="width:40%;display:inline;">
                    <img src="{{captcha_src()}}" style="border-radius:5px;" alt="图片加载失败" onclick="this.src='{{captcha_src()}}'+Math.random()">
                </div>
                <button type="submit" class="btn btn-success form-control">注册</button>
            </form>
            
        </div>
    </body>
    <!-- js 脚本 ajax传输 -->
    <script>
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

    //     // form 表单绑定事件
    //     $('form:first').submit(function(){

    //         // 数据验证 
    //         let uname = $('form input[name=uname]').val();
    //         let upass = $('form input[name=upass]').val();
    //         let reupass = $('form input[name=reupass]').val();
    //         let code = $('form input[name=code]').val();

    //         // 用户名不能为空
    //         if( uname == false ){
    //             layer.msg('用户名不能为空');
    //             return false;
    //         }

    //         // 密码 和 确认密码不能为空
    //         if( upass == false && reupass == false ){
    //             layer.msg('输入密码不能为空');
    //             return false;
    //         }

    //         // 验证输入的两次密码是否一致
    //         if( upass != reupass ){
    //             layer.msg('两次密码不一致');
    //             return false;
    //         }

    //         $.post('/home/register/store',{uname:uname,upass:upass,code:code},function(res){
    //             if (res.msg == 'ok') {
    //                 // 注册成功!
    //                 layer.msg(res.info);

    //                 // 关闭当前窗口 500毫秒后
    //                 setTimeout(function(){
    //                     window.parent.location.reload();
    //                     var index = parent.layer.getFrameIndex(window.name);
    //                     parent.layer.close(index);
    //                 },500);
                    
    //             } else {
    //                 layer.msg(res.info);
    //             }
    //         },'json');

    //         return false;
    //     })
    // </script>
    <!-- js 脚本 ajax传输 -->
</html>