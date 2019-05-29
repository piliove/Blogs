<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redis;

class BannersController extends Controller
{
    // 轮播图操作 列表
    public function index()
    {
        $data = DB::table('banners')->get();
        // 加载视图 渲染轮播图列表页面
        return view('admin.banners.index',['data'=>$data]);
    }

    // 轮播图 页面展示
    public function create()
    {
        // 加载视图 渲染页面
        return view('admin.banners.create');
    }

    // 执行 添加轮播图操作
    public function store(Request $request)
    {
        // 检查Redis是否存在
        if ( Redis::exists('banners_redis_data') ) {
            Redis::del('banners_redis_data');
        }

        // 检测是否有上传文件
        if ( $request->hasFile('url') ) {
            $url = $request->file('url')->store(date('Ymd'));
        } else {
            return back()->with('error','请选择图片');
            // $url = '';
        }

        // 压入数据
        $data['title'] = $request->input('title','');
        $data['desc']  = $request->input('desc','');
        $data['url']   = $url;
        $data['status'] = $request->input('status','');

        // 插入数据
        $res = DB::table('banners')->insert($data);

        // 返回受影响的行数
        if ( $res ) {
            return redirect('admin/banners/index')->with('success','添加成功!');
        } else {
            return back()->with('error','添加失败!');
        }
    }

    // 执行 删除轮播图操作
    public function del(Request $request)
    {
        // 检查Redis是否存在
        if ( Redis::exists('banners_redis_data') ) {
            Redis::del('banners_redis_data');
        }

        //接收ID值,token值
        $id = $request->input('id',0);

        //进行删除操作
        $res = DB::table('banners')->where('id',$id)->delete();

        //向ajax返回信息
        if ( $res ) {
            echo 'ok';
        } else {
            echo 'err';
        }
    }

    // 显示 修改轮播图页面
    public function edit(Request $request)
    {
        $id = $request->id;
        
        // 获取数据库中的信息
        $banner_data = DB::table('banners')->where('id',$id)->first();
        // dd($banner_data);
        return view('admin.banners.edit',['banner_data'=>$banner_data]);
    }

    // 执行 修改轮播图操作
    public function update(Request $request,$id)
    {
        // 检查Redis是否存在
        if ( Redis::exists('banners_redis_data') ) {
            Redis::del('banners_redis_data');
        }
        
        // 检测是否有上传文件
        if ( $request->hasFile('url') ) {
            //删除旧图片
            Storage::delete($request->input('url'));

            $path = $request->file('url')->store(date('Ymd'));
        } else {
            $path = $request->input('url_path','');
        }

        // 压入数据
        $data['title'] = $request->input('title','');
        $data['desc'] = $request->input('desc','');
        $data['url'] = $path;
        $data['status'] = $request->input('status','');

        // 插入数据到数据库并返回受影响行数
        $res = DB::table('banners')->where('id',$id)->update($data);

        // 判断逻辑
        if ( $res ) {
            return redirect('admin/banners/index')->with('success','修改成功!');
        } else {
            return back()->with('error','修改失败');
        }
        
    }

    // 更改轮播图 状态
    public function change(Request $request)
    {
        $status = $request->input('status','');

        $id = $request->input('id','');

        // 从数据库中修改字段status
        $res = DB::table('banners')->where('id',$id)->update(['status'=>$status]);

        // 返回受影响行数
        if ( $res ) {
            return redirect('admin/banners/index')->with('success','修改成功!');
        } else {
            return back()->with('error','修改失败!');
        }
    }

}
