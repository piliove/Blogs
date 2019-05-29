<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 后台管理系统
 * @param [id] [id]
 * @return [view] [返回页面]
 */
class IndexController extends Controller
{
    // 显示后台首页
    public function index()
    {   
        // 加载视图 渲染页面
        return view('admin.index.index');
    }
}
