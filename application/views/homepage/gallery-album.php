<div class="container-fluid">
	<div class="row">
		<?php if (is_array($photos)) { $photos_id = 1;?>
		<?php foreach ($photos as $photo): ?>
			<div class="col-sm-4 col-md-2">
				<div class="thumbnail">
					<a href="#" role="button" onclick="preview('<?= $photo->link ?>')" data-toggle="modal" data-target="#img-preview">
						<img class="img-fit" src="<?= $photo->link ?>" alt="thumbnail">
					</a>
				</div>
			</div>
		<?php endforeach; } else { echo 'Tidak ditemukan Galeri Foto'; } ?>
	</div>
	<?php $this->load->view('template/homepage/pagination'); ?>
</div>