<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

/**
 * 友情链接
 * @param [id]
 * @return [view] [返回页面]
 */
class LinksController extends Controller
{
    // 显示 友情链接列表
    public function index()
    {
        // 获取友情链接的数据
        $links_data = DB::table('links')->get();

        // 加载视图 渲染页面
        return view('admin/links/index',['links_data'=>$links_data]);
    }

    // 显示 添加友情链接
    public function create()
    {
        // 显示 添加页面
        return view('admin.links.create');
    }

    // 执行 添加友情链接操作
    public function store(Request $request)
    {
        // 验证表单
        $this->validate($request, [
            'lname' => 'required',
            'url' => 'required',
        ],[
            'lname.required'=>'用户名必填',
            'url.required'=>'邮箱必填',
        ]);

        $data['lname'] = $request->input('lname','');
        $data['url']   = $request->input('url','');

        // 插入数据
        $res = DB::table('links')->insert($data);
        
        // 返回受影响的行数
        if ($res) {
            return redirect('admin/links/index')->with('success','添加成功!');
        } else {
            return back()->with('error','添加失败!');
        }

    }

    // 执行 删除友情链接操作
    public function del(Request $request)
    {
        $id = $request->input('id','');
        dd($id);
    }

    // 显示 修改友情链接页面
    public function edit($id)
    {
        // 插入数据
        $data = DB::table('links')->where('id',$id)->first();

        // 加载视图 渲染视图
        return view('admin.links.edit',['data'=>$data]);
    }

    // 执行 修改友情链接操作
    public function update(Request $request,$id)
    {
        // 验证表单
        $this->validate($request, [
            'lname' => 'required',
            'url' => 'required',
        ],[
            'lname.required'=>'用户名必填',
            'url.required'=>'邮箱必填',
        ]);

        $data['lname'] = $request->input('lname','');
        $data['url']   = $request->input('url','');

        $res = DB::table('links')->where('id',$id)->update($data);

        if ( $res ) {
            return redirect('admin/links/index')->with('success','修改成功!');
        } else {
            return back()->with('error','修改失败');
        }

    }
}
