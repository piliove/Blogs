<div class="sidebar" role="navigation">
            <div class="navbar-collapse">
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
					<ul class="nav" id="side-menu">
						<!-- 左侧边栏 首页 -->
						<li>
							<a href="/admin/index/index"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;&nbsp;首页</a>
						</li>

						<!-- 左侧边栏 用户管理 -->
						<li class="">
							<a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;用户管理<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="/admin/users/index">用户列表</a>
								</li>
								<li>
									<a href="/admin/users/create">添加用户</a>
								</li>
							</ul>
						</li>

						<!-- 左侧边栏 栏目分类 -->
						<li class="">
							<a href="#"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbsp;&nbsp;栏目管理<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="/admin/cates/index">栏目列表</a>
								</li>
								<li>
									<a href="/admin/cates/create">添加栏目</a>
								</li>
							</ul>
						</li>

						<!-- 左侧边栏 轮播图管理 -->
						<li class="">
							<a href="#"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>&nbsp;&nbsp;轮播图管理<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="/admin/banners/index">轮播图列表</a>
								</li>
								<li>
									<a href="/admin/banners/create">添加轮播图</a>
								</li>
							</ul>
						</li>

						<!-- 左侧边栏 标签云管理 -->
						<li class="">
							<a href="#"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span>&nbsp;&nbsp;标签云管理<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="/admin/tags/index">标签云列表</a>
								</li>
								<li>
									<a href="/admin/tags/create">添加标签云</a>
								</li>
							</ul>
						</li>

						<!-- 左侧边栏 文章管理 -->
						<li class="">
							<a href="#"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;&nbsp;文章管理<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="/admin/articles/index">文章列表</a>
								</li>
								<li>
									<a href="/admin/articles/create">添加文章</a>
								</li>
							</ul>
						</li>

						<!-- 左侧边栏 个人信息 -->
						<li class="">
							<a href="#"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;&nbsp;信息管理<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="/admin/messages/edit/{{ session('admin_userinfo')->id }}">修改密码</a>
								</li>
								<li>
									<a href="/admin/messages/double/{{ session('admin_userinfo')->id }}">个人信息</a>
								</li>
							</ul>
						</li>

						<!-- 左侧边栏 友情链接 -->
						<li class="">
							<a href="#"><span class="glyphicon glyphicon-send" aria-hidden="true"></span>&nbsp;&nbsp;链接管理<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="/admin/links/index">查看链接</a>
								</li>
								<li>
									<a href="/admin/links/create">添加链接</a>
								</li>
							</ul>
						</li>

					</ul>
					<!-- //sidebar-collapse -->
				</nav>
			</div>
		</div>