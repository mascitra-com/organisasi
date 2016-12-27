<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Headline Berita</h3>
			</div>
			<div class="panel-body table-responsive">
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th>Judul</th>
							<th>Isi</th>
							<th class="text-center text-nowrap">Tanggal Publish</th>
							<th class="text-center text-nowrap">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<form method="POST" action="<?=site_url('setting/headline_store')?>">
							<tr>
								<td colspan="4">
									<input type="text" class="form-control" placeholder="cari judul berita" id="headline" name="headline" required>
								</td>
								<td>
									<button class="btn btn-default btn-block" type="submit"><i class="fa fa-plus"></i></button>
								</td>
							</tr>
						</form>
						<?php if(!empty($articles)){ $no=1; foreach ($articles as $article): ?>
							<tr>
								<td class="text-center"><?=$no++;?></td>
								<td><?=$article['name']?></td>
								<td><?=(strlen($article['body']) > 254) ? substr($article['body'], 0, 254).'...' :  $article['body'] ?></td>
								<td class="text-center text-nowrap"><?= mdate('%d %M %Y', strtotime(str_replace('-', '/', $article['published_at']))) ?></td>
								<td class="text-center text-nowrap"><a href="<?=site_url('setting/headline_delete?id='. $article['id'])?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus headline?');"><i class="fa fa-remove"></i></a></td>
							</tr>
						<?php endforeach; } else { echo "<td colspan='5'>Tidak ada Headline<td>"; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var title = <?=$title;?>
</script>