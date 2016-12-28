<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-body">
					<div class="panel-title"><h3>Agenda</h3></div>
				</div>
			</div>
		</div>
	</div>
</div>

<table class="table">
	<thead>
		<tr>
			<td>No</td>
			<td>Nama Agenda</td>
			<td>Isi Agenda</td>
			<td>Tanggal Pelaksanaan</td>
		</tr>
	</thead>
	<tbody>
	<?php if(!empty($agendas)): $no=1; foreach($agendas as $agenda):?>
		<tr>
			<td><?=$no++;?></td>
			<td><?=$agenda->name?></td>
			<td><?=$agenda->body?></td>
			<td><?= mdate('%d %M %Y', strtotime(str_replace('-', '/', $agenda->agenda_date))) ?></td>
		</tr>
	<?php endforeach; endif;?>
	</tbody>
</table>