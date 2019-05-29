<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Redis;

/**
 * 前台首页
 * @param [id] [id]
 * @return [view] [返回主页面]
 */
class IndexController extends Controller
{
    // 前台 栏目 数据
    static public function getPidCates()
    {
        // 获取 栏目
        $cates_parent_data = DB::table('cates')->where('pid',0)->orderBy('id','asc')->get();

        $temp = [];
        foreach( $cates_parent_data as $key => $value ){
            // 获取所有的子级栏目
            $cates_child_data = DB::table('cates')->where('pid',$value->id)->get();
            $value->sub = $cates_child_data;
            $temp[] = $value;
        }

        return $temp;
    }

    // 获取 文章下 栏目的名称
    static public function getCatesCname()
    {
        // 获取指定的cates表中的id 和 cname
        $cates_cname_data = DB::table('cates')->select('id','cname')->get();

        // 遍历 id作为数组元素下标 创建空数组$temp
        $temp = [];
        foreach($cates_cname_data as $k => $v){
            $temp[$v->id] = $v->cname;
        }

        return $temp;
    }

    // 前台首页 渲染
    public function index()
    {
        // 判断数据是否存在在缓存中
        if(Redis::exists('cates_redis_data')){
            $cates_data = json_decode(Redis::get('cates_redis_data'));
        } else {
            // 获取 栏目的数据
            $cates_data = self::getPidCates();

            // 压入到redis中
            Redis::setex('cates_redis_data',600,json_encode($cates_data));
        }

        // 判断数据是否存在在缓存中
        if(Redis::exists('banners_redis_data')){
            $banner_data = json_decode(Redis::get('banners_redis_data'));

        } else {
            // 获取轮播图的数据
            $banner_data = DB::table('banners')->where('status',1)->get();

            // 压入到redis中
            Redis::setex('banners_redis_data',600,json_encode($banner_data));
        }

        // 判断数据是否存在在缓存中
        if(Redis::exists('tagname_redis_data')){
            $tagname_data = json_decode(Redis::get('tagname_redis_data'));

        } else {
            // 获取标签云对应的数据
            $tagname_data = DB::table('tagnames')->get();

            // 压入到redis中
            Redis::setex('tagname_redis_data',600,json_encode($tagname_data));
        }  

        // 判断数据是否存在在缓存中
        if(Redis::exists('articles_redis_data')){
            $articles_data = json_decode(Redis::get('articles_redis_data'));

        } else {
            // 获取 首页 默认 最新的15条数据
            $articles_data = DB::table('articles')->orderBy('ctime','desc')->skip(0)->take(15)->get();

            // 压入到redis中
            Redis::setex('articles_redis_data',600,json_encode($articles_data));
        }

        // 调用获取cname方法
        $cates_cname_data = self::getCatesCname();

        // 获取 右侧边栏 轮播图文章图片
        $sperCate_top = DB::table('articles')->orderBy('ctime','asc')->skip(0)->take(2)->get();

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

        // 加载视图 渲染页面 分配数据
        return view('home/index/index',['sperCate_top'=>$sperCate_top,'links_data'=>$links_data,'articles_data_new'=>$articles_data_new,'sperCateOne'=>$sperCateOne,'sperArtOne'=>$sperArtOne,'sperArt'=>$sperArt,'sperCate'=>$sperCate,'cates_cname_data'=>$cates_cname_data,'articles_data'=>$articles_data,'tagname_data'=>$tagname_data,'cates_data'=>$cates_data,'banner_data'=>$banner_data]);
    }

}
