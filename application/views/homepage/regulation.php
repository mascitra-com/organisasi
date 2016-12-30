<div class="container">
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<span class="navbar-brand" style="padding-left: 10px;">Regulasi</span>
			</div>
			<form class="navbar-form navbar-right" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
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
							<?php for($i=0; $i<5;$i++):?>
								<tr>
									<td>
										<div class="heading">
											<h3 class="pull-left">Judul regulasi</h3>
											<button class="btn btn-default pull-right"><i class="fa fa-download"></i> Unduh dokumen</button>
											<div class="clearfix"></div>
										</div>
										<div class="table-responsive">
											<table class="table table-hover table-striped table-bordered">
												<tbody>
													<tr>
														<td class="text-nowrap">Pengeluar Kebijakan</td>
														<td>: Nama orang</td>
													</tr>
													<tr>
														<td class="text-nowrap">Tanggal Keluar</td>
														<td>: 30-des-2016</td>
													</tr>
													<tr>
														<td class="text-nowrap">Perihal</td>
														<td><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex numquam debitis obcaecati illum. Cum a praesentium quo, soluta ab dolorum accusamus corporis id quam fugiat ipsum nemo quae, sint rem!</p></td>
													</tr>
												</tbody>
											</table>
										</div>
									</td>
								</tr>
							<?php endfor;?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>