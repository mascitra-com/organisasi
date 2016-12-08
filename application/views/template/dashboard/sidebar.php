<?php if(!isset($_view['page'])){$_view['page']='dashboard';}?>

<div class="col-sm-1 col-md-2 display-table-cell hidden-xs" id="side-nav">
	<h4 class="title hidden-xs hidden-sm"><i class="fa fa-adjust fa-2x fa-spin"></i>AdminPanel</h4>
	<ul>
		<li class="link <?=(strpos($_view['page'], 'dashboard')!==FALSE)?'active':''?>">
			<a href="<?=site_url('dashboard')?>">
				<i class="fa fa-television fa-fw"></i>
				<span class="nav-label">Dashboard</span>
			</a>
		</li>
		<li class="link <?=(strpos($_view['page'], 'profile')!==FALSE)?'active':''?>">
			<a href="<?=site_url('profile')?>">
				<i class="fa fa-user fa-fw"></i>
				<span class="nav-label">Profil</span>
			</a>
		</li>
		<li class="link <?=(strpos($_view['page'], 'news')!==FALSE)?'active':''?>">
			<a href="#collapse-post" data-toggle="collapse" aria-controls="collapse-post">
				<i class="fa fa-newspaper-o fa-fw"></i>
				<span class="nav-label">Berita</span>
				<i class="fa fa-angle-down fa-fw pull-right hidden-xs hidden-sm"></i>
			</a>
			<ul class="collapse collapseable" id="collapse-post">
				<li>
					<a href="#">
						<i class="fa fa-pencil"></i>
						<span class="nav-label">submenu</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-pencil"></i>
						<span class="nav-label">submenu</span>
					</a>
				</li>
			</ul>
		</li>
		<li class="link <?=(strpos($_view['page'], 'agenda')!==FALSE)?'active':''?>">
			<a href="<?=site_url('agenda')?>">
				<i class="fa fa-calendar fa-fw"></i>
				<span class="nav-label">Agenda</span>
			</a>
		</li>
		<li class="link">
			<a href="#">
				<i class="fa fa-photo fa-fw"></i>
				<span class="nav-label">Galeri</span>
			</a>
		</li>
		<li class="link">
			<a href="#">
				<i class="fa fa-cog fa-fw"></i>
				<span class="nav-label">Pengaturan</span>
			</a>
		</li>
		<li class="link">
			<a href="<?=site_url('auth/logout')?>">
				<i class="fa fa-cog fa-lock fa-fw"></i>
				<span class="nav-label">Logout</span>
			</a>
		</li>
	</ul>
</div>