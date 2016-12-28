<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Data Regulasi <?=isset($search) ? '- Hasil Pencarian' : ''?></h3>
				<a href="<?=site_url('regulation/create')?>" class="btn btn-default btn-sm pull-right"><i class="fa fa-plus"></i> regulasi</a>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive">
				<table class="table table-hover table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th width="20%">Judul</th>
							<th width="40%">Isi Regulasi</th>
							<th class="text-center">Tanggal Dikeluarkan</th>
							<th class="text-center">Dikeluarkan Oleh</th>
							<th class="text-center">File</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
                    <?php if(is_array($regulations)){ $no = $number+1; foreach ($regulations as $regulation): ?>
						<tr>
							<td class="text-center"><?=$no++?></td>
							<td><?= (strlen($regulation->name) > 100) ? substr($regulation->name, 0, 100).'...' :  $regulation->name ?></td>
							<td><?= (strlen($regulation->body) > 100) ? substr($regulation->body, 0, 100).'...' :  $regulation->body ?></td>
							<td class="text-center"><?= mdate('%d-%m-%Y', strtotime(str_replace('-', '/', $regulation->issued_at))); ?></td>
							<td class="text-center"><?=$regulation->issued_by?></td>
							<?=DUMP(str_replace(FCPATH, base_url(), $regulation->link))?>
							<td class="text-center"><a href="<?=str_replace(base_url(), FCPATH, $regulation->link)?>" class="btn btn-default btn-sm" download><i class="fa fa-file-word-o"></i></a></td>
							<td class="text-center text-nowrap">
								<a href="<?=site_url('regulation/edit?id='.$regulation->id)?>" class="btn btn-default btn-sm"><i class="fa fa-info"></i></a>
								<a href="<?=site_url('regulation/destroy?id='.$regulation->id)?>" class="btn btn-default btn-sm" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
                    <?php endforeach; } else { echo "<td colspan='8'>$regulations<td>"; } ?>
                    </tbody>
				</table>
                <?php $this->load->view('template/dashboard/pagination'); ?>
            </div>
		</div>
	</div>
</div>