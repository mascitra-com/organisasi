<div class="row">
	<div class="col-sm-6">		
		<div class="panel-body table-responsive table-full-width">
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<td>Nama Level</td>
						<td>Nama Menu</td>
						<td>Aksi</td>
					</tr>
				</thead>
				<tbody>
				<?php if(!empty($privileges)): $no=1; foreach ($privileges as $privilege): ?>
					<tr>
						<td><?= $privilege->id_groups ?></td>
						<td><?= $privilege->id_menu ?></td>
						<td><a href="<?= site_url('privilege/kelola/'. $privilege->id_groups) ?>">Kelola</a></td>
					</tr>
				<?php endforeach; endif; ?>
				</tbody>
			</table>
		</div>
	</div>