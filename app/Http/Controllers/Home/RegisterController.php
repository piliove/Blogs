<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Captcha;
use Hash;

/**
 * 前台用户注册
 * @param [id]
 * @return [view] [返回主页面]
 */
class RegisterController extends Controller
{
    // 显示 前台页面
    public function index()
    {
        // 加载视图 渲染页面
        return view('home.register.index');
    }

    // 执行 注册表单操作
    public function store(Request $request)
    {
        // 获取表单提交过来的数据
        $uname = $request->input('uname','');
        $upass = $request->input('upass','');
        $reupass = $request->input('reupass','');
        
        // 验证 验证码
        if(!Captcha::check($request->input('code'))){
            // 返回错误信息
            return back()->with('error','验证码错误!');
        }

        // 用户名不能为空
        if( $uname == false ){
            // 返回错误信息
            return back()->with('error','用户名不能为空');
        }

        // 密码 和 确认密码不能为空
        if( $upass == false && $reupass == false ){
            return back()->with('error','输入密码不能为空');
        }

        // 验证输入的两次密码是否一致
        if( $upass != $reupass ){
            return back()->with('error','两次密码不一致');
        }

        $data['uname'] = $request->input('uname','');
        $data['upass'] = Hash::make($request->input('upass'));
        $data['token'] = str_random(50);
        $data['ctime'] = date('Y-m-d H:i:s',time());

        $res = DB::table('users')->insert($data);

        if ( $res ) {
            // 返回成功信息
            return redirect('home/login/login')->with('success','添加成功!');
        } else {
            // 返回错误信息
            return back()->with('error','添加失败!');
        }
        
    }
}
