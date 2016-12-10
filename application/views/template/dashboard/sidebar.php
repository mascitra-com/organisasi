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
		<li class="link <?=(strpos($_view['page'], 'profile')!==FALSE)?'active':''?>">
			<a href="<?=site_url('profile')?>">
				<i class="fa fa-bank fa-fw"></i>
				<span class="nav-label">Organisasi</span>
			</a>
		</li>
		<li class="link <?=(strpos($_view['page'], 'agenda')!==FALSE)?'active':''?>">
			<a href="<?=site_url('agenda')?>">
				<i class="fa fa-calendar fa-fw"></i>
				<span class="nav-label">Agenda</span>
			</a>
		</li>
		<li class="link">
			<a href="#collapse-gallery" data-toggle="collapse" aria-controls="collapse-gallery">
				<i class="fa fa-picture-o fa-fw"></i>
				<span class="nav-label">Galeri</span>
				<i class="fa fa-angle-down fa-fw pull-right hidden-xs hidden-sm"></i>
			</a>
			<ul class="collapse collapseable" id="collapse-gallery">
				<li class="<?=(strpos($_view['page'], 'gallery/photos')!==FALSE)?'active':''?>">
					<a href="<?=site_url('gallery/photos')?>">
						<i class="fa fa-file-image-o fa-fw"></i>
						<span class="nav-label">Foto</span>
					</a>
				</li>
				<li class="<?=(strpos($_view['page'], 'gallery/videos')!==FALSE)?'active':''?>">
					<a href="<?=site_url('gallery/videos')?>">
						<i class="fa fa-file-video-o fa-fw"></i>
						<span class="nav-label">Video</span>
					</a>
				</li>
			</ul>
		</li>
		<li class="link <?=(strpos($_view['page'], 'User')!==FALSE)?'active':''?>">
			<a href="#collapse-hak" data-toggle="collapse" aria-controls="collapse-hak">
				<i class="fa fa-user fa-fw"></i>
				<span class="nav-label">Hak Akses</span>
				<i class="fa fa-angle-down fa-fw pull-right hidden-xs hidden-sm"></i>
			</a>
			<ul class="collapse collapseable" id="collapse-hak">
				<li>
					<a href="<?=site_url('auth')?>">
						<i class="fa fa-user fa-fw"></i>
						<span class="nav-label">User</span>
					</a>
				</li>
				<li>
					<a href="<?=site_url('auth/create_group')?>">
						<i class="fa fa-users fa-fw"></i>
						<span class="nav-label">User Group</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-bars fa-fw"></i>
						<span class="nav-label">Menu</span>
					</a>
				</li>
			</ul>
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