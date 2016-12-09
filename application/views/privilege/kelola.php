<div class="row">
	<div class="col-sm-6">		
		<div class="panel-body table-responsive table-full-width">
			
			<p><?= $group->description ?></p>
			
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<?php foreach ($menus as $menu): ?>
							<td><?= $menu->nama_menu ?></td>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<form action="#" id="form">
					<label for="id_groups">Id</label>
					<input type="text" id="id_groups" name="id_groups" value="<?= $group->id ?>" readonly>
						<tr>
							<?php foreach ($menus as $menu): ?>
								<td><input type="checkbox" value="<?= $menu->id ?>" name="id_menu" onclick="add_privilege(<?=$menu->id?>)"></td>
							<?php endforeach ?>
						</tr>
					</form>
				</tbody>
			</table>
		</div>
	</div>