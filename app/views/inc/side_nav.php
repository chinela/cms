<div class="sidebar-menu">
	<header class="logo1">
		<a href="javascript:void(0)" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
	</header>
		<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
			<div class="menu">
				<ul id="menu" >
					<li><a href="<?php echo URLROOT; ?>admin/dashboard"><i class="fa fa-tachometer"></i> <span>Dashboard</span><div class="clearfix"></div></a></li>
						<li id="menu-academico" ><a href="<?php echo URLROOT; ?>admin/comments"><i class="fa fa-envelope nav_icon"></i><span>Comments</span><div class="clearfix"></div></a></li>
						<li id="menu-academico" ><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i><span> Posts</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
						<ul id="menu-academico-sub" >
                            <li id="menu-academico-avaliacoes" ><a href="<?php echo URLROOT; ?>admin/posts">View all posts</a></li>
                            <li id="menu-academico-avaliacoes" ><a href="<?php echo URLROOT; ?>admin/posts/add">Add post</a></li>
						</ul>
					</li>
					<li id="menu-academico" ><a href="#"><i class="fa fa-users" aria-hidden="true"></i><span>Users</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
						<ul id="menu-academico-sub" >
                            <li id="menu-academico-avaliacoes" ><a href="<?php echo URLROOT; ?>admin/users">View all Users</a></li>
                            <li id="menu-academico-avaliacoes" ><a href="<?php echo URLROOT; ?>admin/users/add">Add user</a></li>
						</ul>
					</li>
					<li><a href="<?php echo URLROOT; ?>admin/categories"><i class="fa fa-list-ul" aria-hidden="true"></i>  <span>categories</span><div class="clearfix"></div></a></li>
				</ul>
			</div>
		</div>
	<div class="clearfix"></div>		
</div>