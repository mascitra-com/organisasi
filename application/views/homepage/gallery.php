<div class="container-fluid">
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<span class="navbar-brand" style="padding-left: 10px;">Gallery</span>
			</div>
			<form class="navbar-form navbar-right" role="search" action="<?=site_url('homepage/search_gallery')?>" method="POST">
				<div class="form-group">
					<a href="<?=site_url('homepage/refresh_gallery')?>" class="btn btn-default"><i class="fa fa-refresh"></i></a>
				</div>
				<div class="form-group">
					<input type="text" name="name" class="form-control" placeholder="Nama Galeri" value="<?= isset($search->name) ?$search->name : '' ?>">
				</div>
				<div class="form-group">
					<input type="text" name="description" class="form-control" placeholder="Deskripsi Galeri" value="<?= isset($search->description) ?$search->description : '' ?>">
				</div>
				<button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Search</button>
			</form>
		</div>
	</div>
	<div class="row">
		<?php if (is_array($galleries)){ $no = 1 + $number;
			foreach ($galleries as $gallery): ?>
			<a href="<?= site_url('homepage/gallery_show/'.$gallery->slug) ?>">
				<div class="col-sm-4 col-md-2">
					<div class="thumbnail">
						<img class="img-fit" src="<?=base_url('assets/img/default-folder.png')?>" alt="thumbnail">
						<div class="caption">
							<h4><?= (strlen($gallery->name) > 50) ? substr($gallery->name, 0, 50).'...' :  $gallery->name ?></h4>
						</div>
					</div>
				</div>
			</a>
		<?php endforeach; } else { echo 'Tidak ditemukan Galeri Foto'; } ?>
	</div>
	<?php $this->load->view('template/homepage/pagination'); ?>
</div>