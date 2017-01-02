<div class="container">
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<span class="navbar-brand" style="padding-left: 10px;">Regulasi</span>
			</div>
			<form class="navbar-form navbar-right" role="search" method="POST" action="<?=site_url('homepage/search/regulasi')?>">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search" name="search">
				</div>
				<button type="submit" class="btn btn-default">Cari</button>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-body">
					<div class="panel-title"></div>
					<div class="container-fluid table-responsive">
						<table class="table table-hover table-bordered table-striped">
							<?php if(is_array($regulations)) { foreach($regulations as $regulation):?>
								<tr>
									<td>
										<div class="heading">
											<h3 class="pull-left"><?=$regulation->name?></h3>
											<a href="<?=str_replace(str_replace("\\",'/',FCPATH), base_url(), $regulation->link)?>" class="btn btn-default pull-right" download><i class="fa fa-download"></i> Unduh dokumen</a>
											<div class="clearfix"></div>
										</div>
										<div class="table-responsive">
											<table class="table table-hover table-striped table-bordered">
												<tbody>
													<tr>
														<td class="text-nowrap">Pengeluar Kebijakan</td>
														<td>: <?=$regulation->issued_by?></td>
													</tr>
													<tr>
														<td class="text-nowrap">Tanggal Keluar</td>
														<td>: <?= mdate('%d %M %Y', strtotime(str_replace('-', '/', $regulation->issued_at))) ?></td>
													</tr>
													<tr>
														<td class="text-nowrap">Perihal</td>
														<td><p><?=$regulation->body?></p></td>
													</tr>
												</tbody>
											</table>
										</div>
									</td>
								</tr>
							<?php endforeach; } else { echo "Tidak ada regulasi"; }?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<nav aria-label="...">
		<ul class="pager">
			<?=$pagination?>
		</ul>
	</nav>
</div>