<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Redis;

/**
 * 标签云 管理
 * @param [id]
 * @return [view] [返回页面]
 */
class TagsController extends Controller
{
    // 标签云 列表页面
    public function index()
    {
        $data = DB::table('tagnames')->paginate(5);

        // 加载视图 渲染页面 分配数据
        return view('admin.tags.index',['data'=>$data]);
    }

    // 显示 添加标签
    public function create()
    {
        return view('admin.tags.create');
    }

    // 执行 添加标签
    public function store(Request $request)
    {
        // 检查Redis是否存在
        if ( Redis::exists('tagname_redis_data') ) {
            Redis::del('tagname_redis_data');
        }

        // 验证表单中的数据
        $this->validate($request, [
            'tagname' => 'required',
            'bgcolor' => 'required',
        ],[
            'tagname.required' => '标签名不能为空',
            'bgcolor.required' => '标签颜色不能为空',
        ]);

        // 获取表单中数据
        $data['tagname'] = $request->input('tagname','');
        $data['bgcolor'] = $request->input('bgcolor','');

        // 将数据插入到数据库中
        $res = DB::table('tagnames')->insert($data);

        // 返回受影响行数
        if ( $res ) {
            return redirect('admin/tags/index')->with('success','添加成功!');
        } else {
            return back()->with('error','添加失败!');
        }
        
    }

    // 执行 删除操作
    public function del(Request $request)
    {
        // 检查Redis是否存在
        if ( Redis::exists('tagname_redis_data') ) {
            Redis::del('tagname_redis_data');
        }

        // 接收ID值
        $id = $request->input('id',0);

        // 进行删除操作
        $res = DB::table('tagnames')->where('id',$id)->delete();

        // 向ajax返回信息
        if ( $res ) {
            echo 'ok';
        } else {
            echo 'err';
        }
        
    }

    // 显示 修改操作页面
    public function edit($id)
    {
        $data = DB::table('tagnames')->where('id',$id)->first();

        // 加载视图 渲染页面
        return view('admin.tags.edit',['data'=>$data]);
    }

    // 执行 修改操作
    public function update(Request $request,$id)
    {
        // 检查Redis是否存在
        if ( Redis::exists('tagname_redis_data') ) {
            Redis::del('tagname_redis_data');
        }

        $data['tagname'] = $request->input('tagname','');
        $data['bgcolor'] = $request->input('bgcolor','');

        // 将数据更新到数据库中
        $res = DB::table('tagnames')->where('id',$id)->update($data);

        // 返回受影响行数
        if ( $res ) {
            return redirect('admin/tags/index')->with('success','修改成功!');
        } else {
            return back()->with('error','修改失败');
        }
    }

}
