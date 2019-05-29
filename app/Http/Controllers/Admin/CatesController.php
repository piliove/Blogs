<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Redis;

/**
 * 栏目分类
 * @param [id]
 * @return [view] [页面返回]
 */
class CatesController extends Controller
{
    // 解决分级栏目显示
    static public function getCates(){
        // 原生SQL语句
        // $data = DB::select('select *,concat(path,",",id) as paths from cates order by paths asc');
        // 查询构造器 合并排序
        $data = DB::table('cates')->select('*',DB::raw('concat(path,",",id) as paths'))->orderBy('paths','asc')->get();
        // 判断
        foreach($data as $k => $v){
            if ( $v->pid != 0 ){
                $data[$k]->cname = '|-----'.$v->cname; 
            }
        }

        return $data;
    }

    // 显示栏目分类列表页面
    public function index()
    {

        // 显示 栏目分类列表页面
        return view('admin.cates.index',['data'=>self::getCates()]);
    }

    // 显示 添加栏目页面
    public function create(Request $request)
    {  
        $id = $request->id;
        $cates_data = DB::table('cates')->get();

        // 渲染 添加栏目页面
        return view('admin/cates/create',['id'=>$id,'cates_data'=>self::getCates()]);
    }

    // 执行 添加栏目操作
    public function store(Request $request)
    {   
        // 检查Redis是否存在
        if ( Redis::exists('cates_redis_data') ) {
            Redis::del('cates_redis_data');
        }
        
        // 接收父级id
        $pid = $request->input('pid');

        // 判断该id是否为0
        if ( $pid == 0 ) {
            $path = 0;
        } else {
            // 获取父级数据
            $parent_data = DB::table('cates')->where('id',$pid)->first();
            
            // 拼接成路径
            $path = $parent_data->path.','.$parent_data->id;
        }

        // 压入数据
        $data['pid'] = $pid;
        $data['cname'] = $request->input('cname');
        $data['path'] = $path;

        // 将数据插入到数据库中
        $res = DB::table('cates')->insert($data);

        // 返回受影响的行数
        if ( $res ) {
            return redirect('admin/cates/index')->with('success','添加成功!');
        } else {
            return back()->with('error','添加失败!');
        }
    }
    
    // 执行 删除栏目的操作
    public function del(Request $request)
    {
        //接收ID值
        $id = $request->input('id',0);
        $pid = $request->input('pid',0);

        // 判断pid是否为父级元素
        if ( $pid == 0 ) {
            echo json_encode(['msg'=>'err','info'=>'不能删除顶级栏目']);
            exit;
        }

        //进行删除操作
        $res = DB::table('cates')->where('id',$id)->delete();

        //向ajax返回信息
        if ( $res ) {
            echo json_encode(['msg'=>'ok','info'=>'删除成功!']);
        } else {
            echo json_encode(['msg'=>'err','info'=>'删除失败']);
        }
    }

}
