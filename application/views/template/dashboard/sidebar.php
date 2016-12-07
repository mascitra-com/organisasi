<?php if(!isset($_view['page'])){$_view['page']='dashboard';}?>

<div class="col-sm-1 col-md-2 display-table-cell hidden-xs" id="side-nav">
	<h3 class="title hidden-xs hidden-sm">Admin Panel</h3>
	<ul>
		<li class="link <?=(strpos($_view['page'], 'dashboard')!==FALSE)?'active':''?>">
			<a href="<?=site_url('dashboard')?>">
				<span class="glyphicon glyphicon-th" aria-hidden="true"></span>
				<span class="nav-label">Dashboard</span>
			</a>
		</li>
		<li class="link <?=(strpos($_view['page'], 'profile')!==FALSE)?'active':''?>">
			<a href="<?=site_url('profile')?>">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				<span class="nav-label">Profil</span>
			</a>
		</li>
		<li class="link <?=(strpos($_view['page'], 'news')!==FALSE)?'active':''?>">
			<a href="#collapse-post" data-toggle="collapse" aria-controls="collapse-post">
				<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
				<span class="nav-label">Berita</span>
				<span class="glyphicon glyphicon-chevron-down pull-right nav-label" aria-hidden="true"></span>
			</a>
			<ul class="collapse collapseable" id="collapse-post">
				<li>
					<a href="#">
						<span class="glyphicon glyphicon-pencil"></span>
						<span class="nav-label">submenu</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="glyphicon glyphicon-pencil"></span>
						<span class="nav-label">submenu</span>
					</a>
				</li>
			</ul>
		</li>
		<li class="link <?=(strpos($_view['page'], 'agenda')!==FALSE)?'active':''?>">
			<a href="<?=site_url('agenda')?>">
				<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
				<span class="nav-label">Agenda</span>
			</a>
		</li>
		<li class="link">
			<a href="#">
				<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
				<span class="nav-label">Galeri</span>
			</a>
		</li>
		<li class="link">
			<a href="#">
				<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
				<span class="nav-label">Pengaturan</span>
			</a>
		</li>
	</ul>
</div>