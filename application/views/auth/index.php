<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title pull-left"><?=lang('index_heading')?></h3>
		<a href="<?=site_url('auth/create_user')?>" class="btn btn-default pull-right"><i class="fa fa-plus-circle fa-fw"></i> Tambah user</a>
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
					<td class="text-center">Grup</td>
					<td class="text-center">Status</td>
					<td class="text-center">Aksi</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user):?>
					<tr>
						<td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
						<td>
							<?php foreach ($user->groups as $group):?>
								<?php echo anchor('auth/edit_group/' . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')); ?>
								<br/>
							<?php endforeach?>
						</td>
						<td><?php echo $user->active ? anchor('auth/deactivate/' . $user->id, lang('index_active_link')) : anchor('auth/activate/' . $user->id, lang('index_inactive_link')); ?></td>
						<td><?php echo anchor('auth/edit_user/' . $user->id, 'Edit'); ?></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>



<table cellpadding=0 cellspacing=10>
	<tr>
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
		<th><?php echo lang('index_action_th');?></th>
	</tr>
	
</table>

<p><?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?></p>