<div class="container">
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<span class="navbar-brand" style="padding-left: 10px;">Agenda</span>
			</div>
			<form class="navbar-form navbar-right" role="search" method="POST" action="<?=site_url('homepage/search/agenda')?>">
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
					<div class="panel-title"><h3>Agenda</h3></div>
					<div class="container-fluid table-responsive">
						<table class="table table-hover table-striped">
							<tbody>
								<?php if(is_array($agendas)){ $no=1; foreach($agendas as $agenda):?>
									<tr>
										<td class="text-center text-nowrap" width="10%">
											<h1><?=date('d', strtotime($agenda->agenda_date))?></h1>
											<span><?=date('F', strtotime($agenda->agenda_date))?><br><?=date('Y', strtotime($agenda->agenda_date))?></span>
										</td>
										<td>
											<h3><?=$agenda->name?></h3>
											<p><?=$agenda->body?></p>
										</td>
									</tr>
								<?php endforeach; } else { echo 'Tidak ada agenda'; }?>
							</tbody>
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