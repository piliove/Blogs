<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;

/**
 * 用户管理
 * @param [id]
 * @return [view]
 */
class UsersController extends Controller
{
    // 加载视图 渲染用户列表
    public function index(Request $request)
    {
        //从表单中接收搜索框中的信息
        $search = $request->input('search','');
        
        // 获取数据库中所有用户信息
        $data = DB::table('users')->where('uname','like','%'.$search.'%')->paginate(5);
        
        //加载视图
        return view('admin.users.index',['data'=>$data,'search'=>$search]);
    }

    // 显示 添加用户
    public function create()
    {
        return view('admin.users.create');
    }

    // 执行 添加用户
    public function store(Request $request)
    {
        // 表单 验证
        $this->validate($request, [
            'uname' => 'required|regex:/^[a-zA-Z]{1}[\w]{5,17}$/',
            'upass' => 'required|regex:/^[\w]{6,18}$/',
            'reupass'=>'required|same:upass',

        ],[
            'uname.required'=>'用户名必填',
            'upass.required'=>'用户密码必填',
            'upass.regex'=>'密码必须设置6~18位',
            'reupass.required'=>'确认密码必填',
            'reupass.same'=>'输入两次密码必须一致',
            'uname.regex'=>'用户名必须以字母开头且长度为6~18位',
        ]);

        // 检测是否有上传文件
        if ( $request->hasFile('profile') ) {
            $path = $request->file('profile')->store(date('Ymd'));
        } else {
            $path = '';
        }
 
        // 插入数据
        $data['profile'] = $path;
        $data['uname'] = $request->input('uname');
        $data['upass'] = Hash::make($request->input('upass'));
        $data['token'] = str_random(50);
        $data['status'] = 0;
        $data['ctime'] = date('Y-m-d H:i:s',time());

        // 接收值插入到数据库中
        $res = DB::table('users')->insert($data);
        
        // 判断成功与否
        if ($res) {
            return redirect('admin/users/index')->with('success','添加成功!');
        } else {
            return back()->with('error','添加失败!');
        }

    }

    // 执行 删除操作
    public function dels(Request $request)
    {
        //接收ID值,token值
        $id = $request->input('id',0);
        $token = $request->input('token',0);

        // 获取数据库中的token
        $data_token = DB::table('users')->select('token')->where('id',$id)->first();

        // 判断 
        if ( $data_token->token != $token ) {
            echo 'err';
            exit;
        } 

        //进行删除操作
        $res = DB::table('users')->where('id',$id)->delete();

        //向ajax返回信息
        if ( $res ) {
            echo 'ok';
        } else {
            echo 'err';
        }
        
    }

    // 显示 修改用户信息页面
    public function edit($id,$token)
    {
        // 获取数据库中的记录
        $data = DB::table('users')->where('id',$id)->first();

        // 判断token值是否一致
        if ( $data->token != $token ) {
            return back()->with('error','token验证错误!');
        }

        // 加载视图,传递变量
        return view('admin.users.edit',['data'=>$data]);
    }

    // 执行 修改用户操作
    public function update(Request $request,$id)
    {
        // 验证表单
        $this->validate($request, [
            'uname' => 'required|regex:/^[a-zA-Z]{1}[\w]{5,17}$/',
            'email' => 'required|regex:/^[\w]+@[\w]+\.[\w]+$/',
        ],[
            'uname.required'=>'用户名必填',
            'email.required'=>'邮箱必填',
            'uname.regex'=>'用户名格式不正确',
            'email.regex'=>'邮箱格式不正确',
        ]);

        // 检测是否有上传文件
        if ( $request->hasFile('profile') ) {
            
            //删除旧图片
            Storage::delete($request->input('profile'));

            $path = $request->file('profile')->store(date('Ymd'));
        } else {
            $path = $request->input('profile_path','');
        }

        // 插入数据
        $data['uname'] = $request->input('uname','');
        $data['email'] = $request->input('email','');
        $data['profile'] = $path;
        $data['token'] = str_random(50);

        // 插入数据到数据库
        $res = DB::table('users')->where('id',$id)->update($data);
        
        // 判断逻辑 返回受影响的函数
        if ( $res ) {
            return redirect('admin/users/index')->with('success','修改成功!');
        } else {
            return back()->with('error','修改失败!');
        }
        
    }

}
