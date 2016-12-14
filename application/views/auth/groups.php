<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Grup</h3>
				<a href="<?=site_url('auth/create_group')?>" class="btn btn-default pull-right"><i class="fa fa-plus"></i> grup</a>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive">
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<td class="text-center">ID</td>
							<td class="text-xs-left">Nama</td>
							<td class="text-xs-left">Deskripsi</td>
							<td class="text-center">Hak Akses</td>
							<td class="text-center">Aksi</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($groups as $group):?>
							<tr>
							<td class="text-center"><?=$group->id?></td>
							<td class="text-xs-left"><?=$group->name?></td>
							<td class="text-xs-left"><?=$group->description?></td>
							<td class="text-center"><a href="#" class="btn btn-default btn-xs">hak akses</a></td>
							<td class="text-center">
								<a href="<?=site_url('auth/edit_group/'.$group->id)?>" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
								<a href="#" class="btn btn-default btn-xs"><i class="fa fa-trash"></i></a>
							</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>