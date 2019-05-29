<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

/**
 * 登录 页面
 * @param [id]
 * @return [view]
 */
class LoginController extends Controller
{
    // 显示 登录页面
    public function login()
    {
        // 加载视图 渲染模板
        return view('home.login.login');
    }

    // 执行 登录操作
    public function dologin(Request $request)
    {
        // 获取表单提交过来的数据
        $uname = $request->input('uname','');
        $upass = $request->input('upass','');

        //  判断表单值是否为空
        if ( empty($uname) ) {
            echo json_encode(['msg'=>'err','info'=>'用户名或密码错误']);
            exit;
        }

        // 获取数据库中的数据
        $data = DB::table('users')->where('uname',$uname)->first();

        // 核对密码是否一致
        if ( !Hash::check($upass, $data->upass) ) {
            echo json_encode(['msg'=>'err','info'=>'用户名或密码错误']);
            exit;
        }

        // 登录 压入session
        session(['home_login'=>true]);
        session(['home_userinfo'=>$data]);

        // 登录到主页
        echo json_encode(['msg'=>'ok','info'=>'登录成功!']);

    }

    // 执行 退出登录操作
    public function logout(Request $request)
    {
        // 清空session数据
        session(['home_login'=>false]);
        session(['home_userinfo'=>false]);

        // 登录回到主页
        return back();
    }

}
