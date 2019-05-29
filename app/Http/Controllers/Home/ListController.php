<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Redis;

/**
 * 前台 列表页
 * @param
 * @return
 */
class ListController extends Controller
{
    // 显示 文章列表页面
    public function list(Request $request)
    {
        // 获取指定id的一条记录
        $cid = $request->input('cid','');
        
        // 获取指定的一条数据记录
        $onecate = DB::table('cates')->where('id',$cid)->get();

        // 判断数据是否存在在缓存中
        if(Redis::exists('cates_redis_data')){
            
            $cates_data = json_decode(Redis::get('cates_redis_data'));
        } else {
            // 获取 分级栏目 数据
            $cates_data = IndexController::getPidCates();

            // 压入到redis中
            Redis::setex('cates_redis_data',600,json_encode($cates_data));
        }

        // 获取tagname_id
        $tagname_id = $request->input('tagname_id',0);

        if($tagname_id != 0){
            // 获取 tagname_id 下的文章所有数据
            $list_data = DB::table('articles')->where('tid',$tagname_id)->orderBy('ctime','desc')->paginate(5);
        } else {
            // 获取 cid 下的文章所有数据
            $list_data = DB::table('articles')->where('cid',$cid)->orderBy('ctime','desc')->paginate(5);
        }
        
        // 获取标签云的数据
        $tagname_data = DB::table('tagnames')->get();

        // 获取所有遍历过的栏目的数据
        $cates_cname_data = IndexController::getCatesCname();

        // 获取所有栏目的记录
        $data = DB::table('cates')->get();

        // 获取特别推荐栏目
        $sperCate = DB::table('articles')->orderBy('goodnum','asc')->skip(0)->take(3)->get();
        // 获取推荐文章第一栏目
        $sperCateOne = DB::table('articles')->orderBy('ctime','asc')->first();
        // 获取 推荐文章 最新的4条数据
        $articles_data_new = DB::table('articles')->orderBy('ctime','asc')->skip(0)->take(4)->get();
        // 获取点击排行栏目
        $sperArt = DB::table('articles')->orderBy('num','asc')->skip(0)->take(4)->get();
        // 获取点击排行第一的栏目
        $sperArtOne = DB::table('articles')->orderBy('num','asc')->first();

        // 右侧边栏 友情链接
        $links_data = DB::table('links')->get();

        
        // 加载视图 渲染页面
        return view('home.list.list',['links_data'=>$links_data,'sperArtOne'=>$sperArtOne,'sperArt'=>$sperArt,'articles_data_new'=>$articles_data_new,'sperCateOne'=>$sperCateOne,'sperCate'=>$sperCate,'data'=>$data,'onecate'=>$onecate,'cates_cname_data'=>$cates_cname_data,'tagname_data'=>$tagname_data,'cates_data'=>$cates_data,'list_data'=>$list_data]);
    }

    // 搜索分页
    public function search(Request $request)
    {
       // 获取指定id的一条记录
       $cid = $request->input('cid','');
        
       // 获取指定的一条数据记录
       $onecate = DB::table('cates')->where('id',$cid)->get();

       // 获取 分级栏目 数据
       $cates_data = IndexController::getPidCates();

       // 获取tagname_id
       $tagname_id = $request->input('tagname_id',0);

       //从表单中接收搜索框中的信息
       $search = $request->input('search','');

       if($tagname_id != 0){
           // 获取 tagname_id 下的文章所有数据 并且分页搜索
           $list_data = DB::table('articles')->where('tid',$tagname_id)->orderBy('ctime','desc')->where('title','like','%'.$search.'%')->paginate(5);
       } else {
           // 获取 cid 下的文章所有数据 并且分页搜索
           $list_data = DB::table('articles')->where('cid',$cid)->orderBy('ctime','desc')->where('title','like','%'.$search.'%')->paginate(5);
       }
       
       // 获取标签云的数据
       $tagname_data = DB::table('tagnames')->get();

       // 获取所有遍历过的栏目的数据
       $cates_cname_data = IndexController::getCatesCname();

       // 获取所有栏目的记录
       $data = DB::table('cates')->get();

       // 获取特别推荐栏目
       $sperCate = DB::table('articles')->orderBy('goodnum','asc')->skip(0)->take(3)->get();
       // 获取推荐文章第一栏目
       $sperCateOne = DB::table('articles')->orderBy('ctime','asc')->first();
       // 获取 推荐文章 最新的4条数据
       $articles_data_new = DB::table('articles')->orderBy('ctime','asc')->skip(0)->take(4)->get();
       // 获取点击排行栏目
       $sperArt = DB::table('articles')->orderBy('num','asc')->skip(0)->take(4)->get();
       // 获取点击排行第一的栏目
       $sperArtOne = DB::table('articles')->orderBy('num','asc')->first();

       // 右侧边栏 友情链接
       $links_data = DB::table('links')->get();
       
       // 加载视图 渲染页面
       return view('home.list.list',['links_data'=>$links_data,'sperArtOne'=>$sperArtOne,'sperArt'=>$sperArt,'articles_data_new'=>$articles_data_new,'sperCateOne'=>$sperCateOne,'sperCate'=>$sperCate,'data'=>$data,'onecate'=>$onecate,'cates_cname_data'=>$cates_cname_data,'tagname_data'=>$tagname_data,'cates_data'=>$cates_data,'list_data'=>$list_data]);
        
    }
}
