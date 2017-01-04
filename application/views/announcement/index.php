<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Pengumuman <?=isset($search) ? '- Hasil Pencarian' : ''?></h3>
				<a class="btn btn-default btn-sm pull-right" href="<?=site_url('announcement/create')?>"><i class="fa fa-plus-circle"></i> Pengumuman baru</a>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive table-full-width">
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<form action="<?=site_url('announcement/search')?>" method="POST">
								<td class="text-center">
									<a href="<?=site_url('announcement/refresh')?>" class="btn btn-default"><i class="fa fa-refresh"></i></a>
								</td>
								<td class="form-group">
									<input type="text" name="name" class="form-control" placeholder="Judul" value="<?= isset($search->name) ?$search->name : '' ?>">
								</td>
								<td class="form-group" width="40%">
									<input type="text" name="body" class="form-control" placeholder="Isi" value="<?= isset($search->body) ?$search->body : '' ?>">
								</td>
								<td class="form-group text-center">
									<select class="form-control" name="published_at">
										<option value="newest" <?= (isset($search->published_at) && $search->published_at === "newest") ? 'selected' : ''?>>Terbaru</option>
										<option value="oldest" <?= (isset($search->published_at) && $search->published_at === "oldest") ? 'selected' : ''?>>Terlama</option>
									</select>
								</td>
								<td class="form-group text-center">
									<select class="form-control" name="priority">
										<option value="all" <?= (isset($search->priority) && $search->priority === "all") ? 'selected' : ''?>>Semua</option>
										<option value="high" <?= (isset($search->priority) && $search->priority === "high") ? 'selected' : ''?>>Penting <i class="fa fa-circle text-primary"></option>
										<option value="common" <?= (isset($search->priority) && $search->priority === "common") ? 'selected' : ''?>>Umum <i class="fa fa-circle text-danger"></option>
									</select>
								</td>
								<td>
									<button type="submit" class="btn btn-default btn-block"><i class="fa fa-search"></i> Search</button>
								</td>
							</form>
						</tr>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-nowrap">Judul Pengumuman</th>
							<th>Isi Pengumuman</th>
							<th class="text-center">Masa aktif</th>
							<th class="text-center">Prioritas</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($announcements)){ $no=1; foreach ($announcements as $announcement): ?>
							<tr>
								<td>0<?=$no++;?></td>
								<td class="text-nowrap"><?=trim_article($announcement->name)?></td>
								<td><?=trim_article($announcement->body)?></td>
								<td class="text-center"><?=date('d-m-Y', strtotime($announcement->expiration_date))?></td>
								<td class="text-center"><a href="#"><i class="fa fa-circle text-<?=($announcement->priority == '1')? 'danger' : 'primary' ?>"></i></a></td>
								<td class="text-center text-nowrap">
									<a class="btn btn-xs btn-default" href="<?=site_url('announcement/edit/'.$announcement->slug)?>"><i class="fa fa-info"></i></a>
									<a class="btn btn-xs btn-default" href="#"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
						<?php endforeach; } else { echo "<td colspan='5'>$announcements<td>"; } ?>
					</tbody>
				</table>
				<?php $this->load->view('template/dashboard/pagination'); ?>
			</div>
		</div>
	</div>
</div>