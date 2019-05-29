<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

/**
 * 前台用户个人中心
 */
class UsersController extends Controller
{
    // 显示 前台个人中心页面
    public function index()
    {
        // 获取 栏目的数据
        $cates_data = IndexController::getPidCates();

        // 加载视图 渲染页面
        return view('home.users.index',['cates_data'=>$cates_data]);
    }

    // 修改个人资料
    public function edit(Request $request)
    {
        // 获取 栏目的数据
        $cates_data = IndexController::getPidCates();

        // 加载视图
        return view('home.users.edit',['cates_data'=>$cates_data]);
    }

    // 修改个人资料
    public function update(Request $request)
    {
        $id = $request->input('id','');

        // 表单 验证
        $this->validate($request, [
            'uname' => 'required|regex:/^[a-zA-Z]{1}[\w]{5,17}$/',
        ],[
            'uname.required'=>'用户名必填',
            'uname.regex'=>'用户名必须以字母开头且长度为6~18位',
        ]);

        // 检测是否有上传文件
        if ( $request->hasFile('profile') ) {
            $path = $request->file('profile')->store(date('Ymd'));
        } else {
            $path = '';
        }

        $data['uname'] = $request->input('uname','');
        $data['email'] = $request->input('email','');
        $data['profile'] = $request->input('profile','');

        $res = DB::table('users')->where('id',$id)->update($data);

        // 返回受影响行数
        if ( $res ) {
            return redirect('home/users/index')->with('success','修改成功!');
        } else {
            return back()->with('error','修改失败!');
        }
    }
}
