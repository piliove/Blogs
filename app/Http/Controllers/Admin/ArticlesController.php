<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redis;

/**
 * 文章管理
 * @param [id]
 * @return [view] [返回页面]
 */
class ArticlesController extends Controller
{
    // 显示 文章列表
    public function index(Request $request)
    {
        //从表单中接收搜索框中的信息
        $search = $request->input('search','');

        // 获取数据库中的信息
        $art_data = DB::table('articles')->where('title','like','%'.$search.'%')->paginate(5);

        // 加载视图 渲染文章列表
        return view('admin.articles.index',['art_data'=>$art_data,'search'=>$search]);
    }

    // 显示 添加页面
    public function create()
    {
        // 获取tagnames表数据
        $tagname_data = DB::table('tagnames')->get();

        // 获取cates表数据
        $cate_data = CatesController::getCates();

        // 加载视图 渲染添加文章页面
        return view('admin.articles.create',['tagname_data'=>$tagname_data,'cate_data'=>$cate_data]);
    }

    // 执行 添加操作
    public function store(Request $request)
    {

        // 验证表单信息
        $this->validate($request, [
            'title' => 'required|max:128',
            'auth'  => 'required|max:32',
            'desc'  => 'required|max:200',
            'content' => 'required',
        ],[
            'title.required'=>'文章标题必填',
            'auth.required'=>'文章作者必填',
            'desc.required'=>'文章描述必填',
            'content.required'=>'文章内容必填',
            'title.max'=>'文章标题过长',
            'auth.max'=>'文章作者过长',
            'desc.max'=>'文章描述过长',
        ]);

        // 检测是否有上传文件
        if ( $request->hasFile('thumb') ) {
            $path = $request->file('thumb')->store(date('Ymd'));
        } else {
            $path = '';
        }

        // 插入数据
        $data['title'] = $request->input('title','');
        $data['auth']  = $request->input('auth','');
        $data['desc']  = $request->input('desc','');
        $data['ctime'] = date('Y-m-d H:i:s',time());
        $data['tid']   = $request->input('tid','');
        $data['cid']   = $request->input('cid','');
        $data['thumb'] = $path;
        $data['num']   = mt_rand(900,4500);
        $data['goodnum'] = mt_rand(100,1000);
        $data['content'] = $request->input('content','');

        // 将数据插入到数据库中
        $res = DB::table('articles')->insert($data);

        // 返回受影响的行数
        if ( $res ) {
            return redirect('admin/articles/index')->with('success','添加成功!');
        } else {
            return back()->with('error','添加失败!');
        }

    }

    // 删除 指定记录条数
    public function del(Request $request)
    {

        // 接收id值
        $id = $request->input('id',0);
        
        // 从数据库中删除数据
        $res = DB::table('articles')->where('id',$id)->delete();

        // 返回信息
        if ( $res ) {
            echo 'ok';
        } else {
            echo 'err';
        }
    }

    // 显示 修改文章操作
    public function edit($id)
    {
        // 获得该id在articles表下的所有数据
        $data = DB::table('articles')->where('id',$id)->first();
        $datas = DB::table('articles')->get();

        // 获取tagnames表 标签云数据
        $tagname_data = DB::table('tagnames')->get();
        $temp_tag = [];
        foreach($tagname_data as $k => $v){
            $temp_tag[$v->id] = $v->tagname;
        }
        // dd($temp_tag);

        // 获取cates表 栏目的名称数据
        $cate_data = CatesController::getCates();
        $temp_cate = [];
        // foreach($cate_data as $k => $v){
        //     $temp_cate[$v->id] = $v->cname;
        // }
        
        // 加载视图 渲染页面
        return view('admin.articles.edit',['datas'=>$datas,'temp_tag'=>$temp_tag,'data'=>$data,'tagname_data'=>$tagname_data,'cate_data'=>$cate_data]);
    }

    // 执行 修改文章操作
    public function update(Request $request,$id)
    {

        // 验证表单信息
        $this->validate($request, [
            'title' => 'required|max:128',
            'auth'  => 'required|max:32',
            'desc'  => 'required|max:200',
            'content' => 'required',
        ],[
            'title.required'=>'文章标题必填',
            'auth.required'=>'文章作者必填',
            'desc.required'=>'文章描述必填',
            'content.required'=>'文章内容必填',
            'title.max'=>'文章标题过长',
            'auth.max'=>'文章作者过长',
            'desc.max'=>'文章描述过长',
        ]);

        // 检测是否有上传文件
        if ( $request->hasFile('thumb') ) {
            
            //删除旧图片
            Storage::delete($request->input('thumb'));

            $path = $request->file('thumb')->store(date('Ymd'));
        } else {
            $path = $request->input('thumb_path','');
        }

        // 插入数据
        $data['title'] = $request->input('title','');
        $data['auth']  = $request->input('auth','');
        $data['desc']  = $request->input('desc','');
        $data['ctime'] = date('Y-m-d H:i:s',time());
        $data['tid']   = $request->input('tid','');
        $data['cid']   = $request->input('cid','');
        $data['thumb'] = $path;
        $data['num']   = mt_rand(900,4500);
        $data['goodnum'] = mt_rand(100,1000);
        $data['content'] = $request->input('content','');

        // 插入数据到数据库
        $res = DB::table('articles')->where('id',$id)->update($data);
        
        // 判断逻辑 返回受影响的函数
        if ( $res ) {
            return redirect('admin/articles/index')->with('success','修改成功!');
        } else {
            return back()->with('error','修改失败!');
        }
    }

}
