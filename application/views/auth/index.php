<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title pull-left"><?=lang('index_heading')?></h3>
		<div class="btn-group pull-right" role="group">
			<a href="<?=site_url('auth/create_user')?>" class="btn btn-default"><i class="fa fa-plus fa-fw"></i><i class="fa fa-user fa-fw"></i></a>
			<a href="<?=site_url('auth/create_group')?>" class="btn btn-default"><i class="fa fa-plus fa-fw"></i><i class="fa fa-users fa-fw"></i></a>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body table-responsive table-full-width">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<td class="text-center">No</td>
					<td class="text-center">Nama Awal</td>
					<td class="text-center">Nama Akhir</td>
					<td class="text-center">Email</td>
					<td class="text-xs-left">Grup</td>
					<td class="text-center">Status</td>
					<td class="text-center">Aksi</td>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach ($users as $user):?>
				<tr>
					<td class="text-center"><?=$no++?></td>
					<td class="text-center"><?=htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8')?></td>
					<td class="text-center"><?=htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8')?></td>
					<td class="text-center"><?=htmlspecialchars($user->email,ENT_QUOTES,'UTF-8')?></td>
					<td class="text-xs-left">
						<?php foreach ($user->groups as $group):?>
							<a href="<?=site_url('auth/edit_group/' . $group->id)?>" class="btn btn-default btn-xs"><?=htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')?></a>
						<?php endforeach?>
					</td>
					<td class="text-center">
						<?php if($user->active): ?>
							<a href="<?=site_url('auth/deactivate/' . $user->id)?>" class="btn btn-xs btn-primary">Aktif</a>
						<?php else: ?>
							<a href="<?=site_url('auth/activate/' . $user->id)?>" class="btn btn-xs btn-danger">non-aktif</a>
						<?php endif;?>
					</td>
					<td class="text-center"><a href="<?=site_url('auth/edit_user/' . $user->id)?>" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>
</div>