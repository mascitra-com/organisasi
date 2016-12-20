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
						<tr>
							<td colspan="4">
								<input type="text" class="form-control" placeholder="cari judul berita">
							</td>
							<td>
								<button class="btn btn-default btn-block"><i class="fa fa-plus"></i></button>
							</td>
						</tr>
						<?php for($i=1; $i<5;$i++):?>
						<tr>
							<td class="text-center">01</td>
							<td>Judul Berita</td>
							<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, nisi.</td>
							<td class="text-center text-nowrap">12 desember 2016</td>
							<td class="text-center text-nowrap"><a href="#" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a></td>
						</tr>
					<?php endfor ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>