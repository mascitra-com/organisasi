<div class="row">
	<div class="col-sm-6">		
		<div class="panel-body table-responsive table-full-width">
			
			<p><?= $group->description ?></p>

			<h6>Menu yg sudah ada: (jangan dihapus dulu, cuma buat ngetes)</h6>
			<ul>
				<li>Id menu: , Nama menu: </li>
			</ul>
			
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<?php foreach ($menus as $menu): ?>
							<td><?= $menu->nama_menu ?></td>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<input type="hidden" id="id_groups" name="id_groups" value="<?= $group->id ?>" readonly>
						<tr>
							<?php foreach ($menus as $menu): ?>
								<td><input type="checkbox" value="<?= $menu->id ?>" name="id_menu" onclick="get_privilege(<?=$menu->id?>)"></td>
							<?php endforeach ?>
						</tr>
					</form>
				</tbody>
			</table>

			<a href="<?=site_url('auth/groups') ?>"><button>Simpan</button></a>
		</div>
	</div>