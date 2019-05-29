<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Redis;

class InfoController extends Controller
{
    // 设置上一页
    static public function prev($id,$cid)
    {
        // 从数据库中查找上一条记录
        $data = DB::table('articles')->where('cid',$cid)->where('id','<',$id)->orderBy('ctime','desc')->first();

        // 返回受影响的行数
        if ( $data ) {
            return $data;
        } else {
            return false;
        }
    } 

    // 设置下一页
    static public function next($id,$cid)
    {
        // 从数据库中查找上一条记录
        $data = DB::table('articles')->where('cid',$cid)->where('id','>',$id)->orderBy('ctime','desc')->first();

        // 返回受影响的行数
        if ( $data ) {
            return $data;
        } else {
            return false;
        }
    } 

    // 展示 文章详情页面
    public function info(Request $request)
    {
        // 获取文章 id
        $id = $request->input('id',0);
        // 获取文章栏目 cid
        $cid = $request->input('cid',0);
        // 获取标签云 tid
        $tagname_id = $request->input('tagname_id',0);

        // 更改数据库中 浏览量
        DB::update("update articles set num = num+1 where id = ".$id);

        // 获取 栏目 数据
        $cates_data = IndexController::getPidCates();

        // 获取该id下文章的所有数据
        $art_data = DB::table('articles')->where('id',$id)->first();
 

        // 获取所有文章
        $art_cate_data = DB::table('articles')->where('cid',$cid)->skip(0)->take(10)->get();

        // 获取cates表中的cname字段
        $cname = DB::table('cates')->select('cname')->where('id',$cid)->first();

        // 获取标签云的数据
        $tagname_data = DB::table('tagnames')->where('id',$tagname_id)->get();

        // 获取标签云的单条数据
        $tagnames_data = DB::table('tagnames')->where('id',$tagname_id)->first();

        // 设置上下页
        $article_prev = self::prev($id,$cid);
        $article_next = self::next($id,$cid);

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

        // 获取评论区的内容
        $tips_data = DB::table('tips')->where('tid',$id)->get();
        // dd($tips_data);
        // 楼层的次数
        $n = 1;

        return view('home.info.info',['n'=>$n,'tips_data'=>$tips_data,'links_data'=>$links_data,'art_cate_data'=>$art_cate_data,'sperArtOne'=>$sperArtOne,'sperArt'=>$sperArt,'articles_data_new'=>$articles_data_new,'sperCateOne'=>$sperCateOne,'sperCate'=>$sperCate,'article_next'=>$article_next,'article_prev'=>$article_prev,'tagnames_data'=>$tagnames_data,'tagname_data'=>$tagname_data,'cname'=>$cname,'cates_data'=>$cates_data,'art_data'=>$art_data]);
    }

    // 显示文章点赞数
    public function goodnum(Request $request)
    {
        // 获取传来的id
        $id = $request->input('id','');

        // 检查用户是否登录过
        if (!session('home_login') == true) {
            echo json_encode(['msg'=>'err','info'=>'请先登录']);
            exit;
        }

        // 获取用户的id
        $uid = session('home_userinfo')->id;

        // 所有点赞的文章
        $tids = DB::table('users_articles')->where('uid',$uid)->select('tid')->get();
        $tids_all = [];
        foreach($tids as $k => $v){
            $tids_all[] = $v->tid;
        }
        
        // 检查是否点赞
        if ( in_array($id,$tids_all) ){
            echo json_encode(['msg'=>'err','info'=>'已点赞']);
            exit;
        }

        // 插入点赞信息数据到数据库
        DB::table('users_articles')->insert(['uid'=>$uid,'tid'=>$id]);

        // 文章的对应字段自增1
        $res = DB::update('update articles set goodnum = goodnum+1 where id ='.$id);

        // 返回受影响行数
        if ( $res ) {
            echo json_encode(['msg'=>'ok','info'=>'+1']);
            exit;
        } else {
            echo json_encode(['msg'=>'err','info'=>'点赞失败']);
            exit;
        }
        
    }

    // 执行 提交 用户评论操作
    public function sends(Request $request)
    {
        // 获取文章 id
        $id = $request->input('id',0);
        // 获取文章 cid
        $cid = $request->input('cid',0);
        // 获取标签云 tid
        $tagname_id = $request->input('tagname_id',0);

        // 判断用户是否登录
        if ( session('home_login') == false ) {
            echo '<script language="JavaScript">;alert("您还未登录");location.href="http://www.laravel.com/home/login/login";</script>;';
            exit;
        }

        $data['uname'] = session('home_userinfo')->uname;
        $data['content'] = $request->input('content','');
        $data['tid'] = $id;
        $data['ctime'] = date('Y-m-d H:i:s',time());

        $res = DB::table('tips')->insert($data);

        if ( $res ) {
            return back()->with('success','评论成功!');
        } else {
            return back()->with('error','评论失败!');
        }

    }
}
