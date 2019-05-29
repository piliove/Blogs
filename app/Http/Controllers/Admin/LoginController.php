<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class LoginController extends Controller
{
    // 显示 登录页面
    public function login()
    {
        return view('admin.login.login');
    }

    // 执行 验证登录操作
    public function dologin(Request $request)
    {
        // 获取表单提交过来的数据
        $uname = $request->input('uname','');
        $upass = $request->input('upass','');

        //  判断表单值是否为空
        if ( empty($uname) && empty($upass) ) {
            return back()->with('error','用户名或密码错误');
        }

        // 获取数据库中的数据
        $data = DB::table('users')->where('uname',$uname)->first();

        // 核对密码是否一致
        if (!Hash::check($upass, $data->upass)) {
            return back()->with('error','用户名或密码错误');
        }

        // // 检测权限
        if(!$data->type == 1){
            return back()->with('error','没有权限');
        }

        // 登录 压入session
        session(['admin_login'=>true]);
        session(['admin_userinfo'=>$data]);

        // 登录到主页
        return redirect('admin/index/index')->with('success','登录成功!');

    }

    // 退出登录
    public function logout()
    {
        // 清空SESSION
        session(['admin_login'=>false]);
        session(['admin_userinfo'=>false]);

        // 退出
        // return back();
        echo "<script>alert('退出成功!');location.href='http://www.laravel.com/admin/login/login';</script>";
    }

    // 更改用户密码
    public function change(Request $request)
    {
        $upass = $request->input('upass','');

        $id = $request->input('id','');

        // 从数据库中修改字段upass
        $res = DB::table('users')->where('id',$id)->update(['upass'=>$upass]);

        // 返回受影响行数
        if ( $res ) {
            return redirect('admin/index/index')->with('success','修改成功!');
        } else {
            return back()->with('error','修改失败!');
        }
        
    }

}
