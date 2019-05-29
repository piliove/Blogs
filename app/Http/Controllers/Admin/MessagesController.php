<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

/**
 * 修改 个人信息
 */
class MessagesController extends Controller
{
    // 显示个人中心
    public function index()
    {
        // 加载视图 渲染页面
        return view('admin.messages.index');
    }

    // 显示 修改密码 页面
    public function edit($id)
    {
        $data = DB::table('users')->where('id',$id)->first();

        return view('admin.messages.edit',['data'=>$data]);
    }

    // 执行 修改密码
    public function update(Request $request,$id)
    {
        
        // 表单 验证
        $this->validate($request, [
            'upass' => 'required|regex:/^[\w]{6,18}$/',
            'reupass'=>'required',

        ],[
            'upass.required'=>'密码必填',
            'upass.regex'=>'密码必须设置6~18位',
            'reupass.required'=>'确认密码必填',
        ]);

        $data['upass'] = Hash::make($request->input('upass'));
    
        $res = DB::table('users')->where('id',$id)->update($data);

        if ( $res ) {
            return redirect("admin/messages/index/$id")->with('success','修改成功!');
        } else {
            return back()->with('error','修改失败!');
        }
        
    }

    // 显示 修改个人信息 页面
    public function double()
    {
        // 加载视图 渲染页面
        return view('admin.messages.double');
    }

    // 执行 修改个人信息
    public function change(Request $request,$id)
    {
        // 表单 验证
        $this->validate($request, [
            'uname' => 'required|regex:/^[a-zA-Z]{1}[\w]{5,17}$/',
        ],[
            'uname.required'=>'用户名称必填',
            'uname.regex'=>'用户名称必须设置6~18位',
        ]);
        
        $data['uname'] = $request->input('uname');
        $data['email'] = $request->input('email');

        $res = DB::table('users')->where('id',$id)->update($data);

        // 返回受影响行数
        if ( $res ) {
            return redirect("admin/messages/index/$id")->with('success','修改成功!');
        } else {
            return back()->with('error','修改失败!');
        }

    }
}
