<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 域名直接访问根目录(前台首页)
Route::get('/', 'Home\IndexController@index');

// 后台登录页
Route::get('admin/login/login','Admin\LoginController@login');
// 执行 登录操作
Route::post('admin/login/dologin','Admin\LoginController@dologin');
// 执行 登出操作
Route::get('admin/login/logout','Admin\LoginController@logout');

// 后台 路由
Route::group(['prefix'=>'admin','middleware'=>'login'],function(){

    // 显示后台首页
    Route::get('index/index','Admin\IndexController@index');

    // 用户列表 管理操作

    // 显示 用户列表页面
    Route::get('users/index','Admin\UsersController@index');
    // 显示 添加用户页面
    Route::get('users/create','Admin\UsersController@create');
    // 执行 添加用户操作
    Route::post('users/store','Admin\UsersController@store');
    // 执行 删除用户操作
    Route::get('users/dels','Admin\UsersController@dels');
    // 显示 修改用户页面
    Route::get('users/edit/{id}/{token}','Admin\UsersController@edit');
    //执行 修改用户信息操作
    Route::post('users/update/{id}','Admin\UsersController@update');

    // 栏目分类 管理操作

    // 栏目分类 显示主页
    Route::get('cates/index','Admin\CatesController@index');
    // 栏目分类 添加栏目显示
    Route::get('cates/create','Admin\CatesController@create');
    // 栏目分类 添加栏目显示
    Route::get('cates/create/{id}','Admin\CatesController@create');
    // 栏目分类 添加栏目操作
    Route::post('cates/store','Admin\CatesController@store');
    // 栏目分类 删除栏目操作
    Route::get('cates/del','Admin\CatesController@del');

    // 轮播图 管理操作

    // 轮播图 显示主页
    Route::get('banners/index','Admin\BannersController@index');
    // 轮播图管理 添加轮播图显示
    Route::get('banners/create','Admin\BannersController@create');
    // 轮播图管理 添加轮播图显示
    Route::post('banners/store','Admin\BannersController@store');
    // 轮播图管理 删除轮播图
    Route::get('banners/del','Admin\BannersController@del');
    // 轮播图管理 修改轮播图显示
    Route::get('banners/edit/{id}','Admin\BannersController@edit');
    // 轮播图管理 修改轮播图操作
    Route::post('banners/update/{id}','Admin\BannersController@update');
    // 轮播图管理 更换激活状态操作
    Route::get('banners/change','Admin\BannersController@change');

    // 标签云 管理操作

    // 标签云 显示主页
    Route::get('tags/index','Admin\TagsController@index');
    // 标签云管理 添加标签云显示
    Route::get('tags/create','Admin\TagsController@create');
    // 标签云管理 添加标签云显示
    Route::post('tags/store','Admin\TagsController@store');
    // 标签云管理 删除标签云
    Route::get('tags/del','Admin\TagsController@del');
    // 标签云管理 修改标签云显示
    Route::get('tags/edit/{id}','Admin\TagsController@edit');
    // 标签云管理 修改标签云操作
    Route::post('tags/update/{id}','Admin\TagsController@update');

    // 文章 管理操作

    // 文章 显示主页
    Route::get('articles/index','Admin\ArticlesController@index');
    // 文章 显示添加页面
    Route::get('articles/create','Admin\ArticlesController@create');
    // 文章 执行添加操作
    Route::post('articles/store','Admin\ArticlesController@store');
    // 文章 执行删除操作
    Route::get('articles/del','Admin\ArticlesController@del');
    // 文章 显示修改操作
    Route::get('articles/edit/{id}','Admin\ArticlesController@edit');
    // 文章 执行修改操作
    Route::post('articles/update/{id}','Admin\ArticlesController@update');

    // 个人信息 修改

    // 显示 个人信息
    Route::get('messages/index/{id}','Admin\MessagesController@index');
    // 显示 修改密码页面
    Route::get('messages/edit/{id}','Admin\MessagesController@edit');
    // 执行 修改密码操作
    Route::post('messages/update/{id}','Admin\MessagesController@update');
    // 执行 修改个人信息操作
    Route::post('messages/change/{id}','Admin\MessagesController@change');
    // 显示 修改个人信息操作
    Route::get('messages/double/{id}','Admin\MessagesController@double');

    // 友情链接

    // 显示 友情链接
    Route::get('links/index','Admin\LinksController@index');
    // 显示 添加友情链接
    Route::get('links/create','Admin\LinksController@create');
    // 执行 添加友情链接
    Route::post('links/store','Admin\LinksController@store');
    // 执行 删除友情链接
    Route::get('links/del','Admin\LinksController@del');
    // 显示 修改友情链接
    Route::get('links/edit/{id}','Admin\LinksController@edit');
    // 执行 修改友情链接
    Route::post('links/update/{id}','Admin\LinksController@update');
    
});

// 前台 路由
Route::group(['prefix'=>'home'],function(){

    // 显示 前台登录页面
    Route::get('login/login','Home\LoginController@login');
    // 执行 前台登录操作
    Route::post('login/dologin','Home\LoginController@dologin');
    // 执行 前台退出登录操作
    Route::get('login/logout','Home\LoginController@logout');

    // 显示 前台个人中心
    Route::get('users/index','Home\UsersController@index');
    // 显示 修改个人信息
    Route::get('users/edit/{id}','Home\UsersController@edit');
    // 执行 修改个人信息
    Route::post('users/update','Home\UsersController@update');

    // 显示 前台注册页面
    Route::get('register/index','Home\RegisterController@index');
    // 执行 前台注册操作
    Route::post('register/store','Home\RegisterController@store');

    // 显示 前台首页
    Route::get('index/index','Home\IndexController@index');
    // 显示 前台列表页
    Route::get('list/list','Home\ListController@list');
    // 显示 前台文章页
    Route::get('info/info','Home\InfoController@info');

    // 执行 提交 用户评论操作
    Route::post('info/sends','Home\InfoController@sends');

    // 显示 点赞
    Route::get('info/goodnum','Home\InfoController@goodnum');
    // 显示 栏目列表搜索分页
    Route::post('list/search','Home\ListController@search');
    
});