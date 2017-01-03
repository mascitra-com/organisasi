<div class="container-fluid">
	<form action="<?=site_url('homepage/search_gallery')?>" method="POST">
		<a href="<?=site_url('homepage/refresh_gallery')?>" class="btn btn-default"><i class="fa fa-refresh"></i></a>
		<input type="text" name="name" class="form-control" placeholder="Nama Galeri" value="<?= isset($search->name) ?$search->name : '' ?>">
		<input type="text" name="description" class="form-control" placeholder="Deskripsi Galeri" value="<?= isset($search->description) ?$search->description : '' ?>">
		<button type="submit" class="btn btn-default btn-block"><i class="fa fa-search"></i> Search</button>
	</form>

	<div class="row">
		<?php if (is_array($galleries)){ $no = 1 + $number;
			foreach ($galleries as $gallery): ?>
			<a href="<?= site_url('homepage/gallery_show/'.$gallery->slug) ?>">
				<div class="col-sm-4 col-md-2">
					<div class="thumbnail">
						<img class="img-fit" src="<?=base_url('assets/img/default-2.png')?>" alt="thumbnail">
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