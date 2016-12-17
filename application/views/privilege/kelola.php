<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Hak Akses <?=$group->description?></h3>
			</div>
			<div class="panel-body table-responsive">
				<div id="privilege-msg">
					a
				</div>
				
				<table class="table table-hover table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center" width="65px">Aksi</th>
							<th>Menu</th>
							<th>Deskripsi</th>
						</tr>
					</thead>
					<tbody>
						<input type="hidden" id="id_groups" name="id_groups" value="<?= $group->id ?>">
						<?php $no=1; foreach ($menus as $menu): ?>
							<tr>
								<td class="text-center"><?=$no++; ?></td>
								<td class="text-center" width="65px"><input type="checkbox" value="<?= $menu->id ?>" name="id_menu" onclick="get_privilege(<?=$menu->id?>)" <?= (!empty($groups_menus)) ? (in_array($menu->id, $groups_menus)) ? 'checked' : '': ''; ?>></td>
								<td><?= $menu->nama_menu ?></td>
								<td><?= $menu->deskripsi_menu ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<br>
				<a href="<?=site_url('auth/groups') ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
			</div>
		</div>
	</div>
</div>