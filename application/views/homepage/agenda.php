<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-body">
					<div class="panel-title"><h3>Agenda</h3></div>
					<div class="container-fluid table-responsive">
						<table class="table table-hover table-striped">
							<tbody>
								<?php if(!empty($agendas)): $no=1; foreach($agendas as $agenda):?>
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
								<?php endforeach; endif;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>