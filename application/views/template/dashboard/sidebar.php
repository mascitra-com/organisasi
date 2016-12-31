<?php if(!isset($_view['page'])){$_view['page']='dashboard';}?>
<div class="col-sm-1 col-md-2 display-table-cell hidden-xs" id="side-nav">
	<h4 class="title hidden-xs hidden-sm"><i class="fa fa-adjust fa-2x fa-spin"></i>Ortala</h4>
	<ul>
		<?php if(show_sidebar_menu('dashboard/index', $link_privileges)): ?>
			<li class="link <?=(strpos($_view['page'], 'dashboard')!==FALSE)?'active':''?>">
				<a href="<?=site_url('dashboard')?>">
					<i class="fa fa-television fa-fw"></i>
					<span class="nav-label">Dashboard</span>
				</a>
			</li>
		<?php endif; ?>

		<?php if(show_sidebar_menu('news/index', $link_privileges)): ?>
			<li class="link <?=(strpos($_view['page'], 'news')!==FALSE)?'active':''?>">
				<a href="#collapse-post" data-toggle="collapse" aria-controls="collapse-post">
					<i class="fa fa-newspaper-o fa-fw"></i>
					<span class="nav-label">Berita</span>
					<i class="fa fa-angle-down fa-fw pull-right hidden-xs hidden-sm"></i>
				</a>
				<ul class="collapse collapseable" id="collapse-post">

					<?php if(show_sidebar_menu('news/create', $link_privileges)): ?>
						<li>
							<a href="<?=site_url('news/create')?>">
								<i class="fa fa-fw fa-pencil"></i>
								<span class="nav-label">Tulis Berita</span>
							</a>
						</li>
					<?php endif; ?>

					<?php if(show_sidebar_menu('news/index', $link_privileges)): ?>
						<li>
							<a href="<?=site_url('news')?>">
								<i class="fa fa-fw fa-newspaper-o"></i>
								<span class="nav-label">Daftar Berita</span>
								<span class="nav-label pull-right"><span class="label label-success"><?=$news_total?></span></span>
							</a>
						</li>
					<?php endif; ?>

					<?php if(show_sidebar_menu('news/draft', $link_privileges)): ?>
						<li>
							<a href="<?=site_url('news/draft')?>">
								<i class="fa fa-fw fa-clone"></i>
								<span class="nav-label">Draft</span>
								<span class="nav-label pull-right"><span class="label label-warning"><?=$draft_total?></span></span>
							</a>
						</li>
					<?php endif; ?>

					<?php if(show_sidebar_menu('news/archive', $link_privileges)): ?>
						<li>
							<a href="<?=site_url('news/archive')?>">
								<i class="fa fa-fw fa-archive"></i>
								<span class="nav-label">Berkas</span>
								<span class="nav-label pull-right"><span class="label label-danger"><?=$archive_total?></span></span>
							</a>
						</li>
					<?php endif; ?>
				</ul>
			</li>
		<?php endif; ?>

		<?php if(show_sidebar_menu('profile/index', $link_privileges)): ?>
			<li class="link <?=(strpos($_view['page'], 'profile')!==FALSE)?'active':''?>">
				<a href="<?=site_url('profile')?>">
					<i class="fa fa-bank fa-fw"></i>
					<span class="nav-label">Profil Organisasi</span>
				</a>
			</li>
		<?php endif; ?>

		<?php if(show_sidebar_menu('agenda/index', $link_privileges)): ?>
			<li class="link <?=(strpos($_view['page'], 'agenda')!==FALSE)?'active':''?>">
				<a href="<?=site_url('agenda')?>">
					<i class="fa fa-calendar fa-fw"></i>
					<span class="nav-label">Agenda</span>
				</a>
			</li>
		<?php endif; ?>

		<?php if(show_sidebar_menu('regulasi/index', $link_privileges)): ?>
			<li class="link <?=(strpos($_view['page'], 'regulation')!==FALSE)?'active':''?>">
				<a href="<?=site_url('regulation')?>">
					<i class="fa fa-legal fa-fw"></i>
					<span class="nav-label">Regulasi</span>
				</a>
			</li>
		<?php endif; ?>

		<?php if(show_sidebar_menu('dashboard/index', $link_privileges)): ?>
			<li class="link">
				<a href="#collapse-gallery" data-toggle="collapse" aria-controls="collapse-gallery">
					<i class="fa fa-picture-o fa-fw"></i>
					<span class="nav-label">Galeri</span>
					<i class="fa fa-angle-down fa-fw pull-right hidden-xs hidden-sm"></i>
				</a>

				<ul class="collapse collapseable" id="collapse-gallery">
					<?php if(show_sidebar_menu('photos/index', $link_privileges)): ?>
						<li>
							<a href="<?=site_url('photos')?>">
								<i class="fa fa-file-image-o fa-fw"></i>
								<span class="nav-label">Foto</span>
							</a>
						</li>
					<?php endif; ?>

					<?php if(show_sidebar_menu('videos/index', $link_privileges)): ?>
						<li>
							<a href="<?=site_url('videos')?>">
								<i class="fa fa-file-video-o fa-fw"></i>
								<span class="nav-label">Video</span>
							</a>
						</li>
					<?php endif; ?>
				</ul>
			</li>

			<?php if(show_sidebar_menu('auth/index', $link_privileges)): ?>
				<li class="link <?=(strpos($_view['page'], 'User')!==FALSE)?'active':''?>">
					<a href="#collapse-hak" data-toggle="collapse" aria-controls="collapse-hak">
						<i class="fa fa-user fa-fw"></i>
						<span class="nav-label">Hak Akses</span>
						<i class="fa fa-angle-down fa-fw pull-right hidden-xs hidden-sm"></i>
					</a>
					<ul class="collapse collapseable" id="collapse-hak">
						<?php if(show_sidebar_menu('auth/index', $link_privileges)): ?>
							<li>
								<a href="<?=site_url('auth')?>">
									<i class="fa fa-user fa-fw"></i>
									<span class="nav-label">User</span>
								</a>
							</li>
						<?php endif; ?>

						<?php if(show_sidebar_menu('auth/groups', $link_privileges)): ?>
							<li>
								<a href="<?=site_url('auth/groups')?>">
									<i class="fa fa-users fa-fw"></i>
									<span class="nav-label">User Group</span>
								</a>
							</li>
						<?php endif; ?>

						<?php if(show_sidebar_menu('menu/index', $link_privileges)): ?>
							<li>
								<a href="<?=site_url('menu')?>">
									<i class="fa fa-bars fa-fw"></i>
									<span class="nav-label">Menu</span>
								</a>
							</li>
						<?php endif; ?>
					</ul>
				</li>
			<?php endif; ?>

			<?php if(show_sidebar_menu('setting/index', $link_privileges)): ?>
				<li class="link">
					<a href="#collapse-setting" data-toggle="collapse" aria-controls="collapse-setting">
						<i class="fa fa-cog fa-fw"></i>
						<span class="nav-label">Pengaturan</span>
						<i class="fa fa-angle-down fa-fw pull-right hidden-xs hidden-sm"></i>
					</a>
					<ul class="collapse collapseable" id="collapse-setting">
						<?php if(show_sidebar_menu('setting/info', $link_privileges)): ?>
							<li>
								<a href="<?=site_url('setting/info')?>">
									<i class="fa fa-info fa-fw"></i>
									<span class="nav-label">Info</span>
								</a>
							</li>
						<?php endif; ?>

						<?php if(show_sidebar_menu('setting/headline', $link_privileges)): ?>
							<li>
								<a href="<?=site_url('setting/headline')?>">
									<i class="fa fa-tasks fa-fw"></i>
									<span class="nav-label">Headline</span>
								</a>
							</li>
						<?php endif; ?>

						<?php if(show_sidebar_menu('setting/banner', $link_privileges)): ?>
							<li>
								<a href="<?=site_url('setting/banner')?>">
									<i class="fa fa-image fa-fw"></i>
									<span class="nav-label">Banner</span>
								</a>
							</li>
						<?php endif; ?>
					</ul>
				</li>
			<?php endif; ?>

			<li class="link">
				<a href="<?=site_url('auth/logout')?>">
					<i class="fa fa-cog fa-lock fa-fw"></i>
					<span class="nav-label">Logout</span>
				</a>
			</li>

		<?php endif; ?>
	</ul>
</div>