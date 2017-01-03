<div class="row">
	<div class="container-fluid" id="quickcount">
		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
			<div class="block blue">
				<div class="block-left">
					<i class="fa fa-users"></i>
				</div>
				<div class="block-right">
					<h3><?=$visitors['guestonline']?> <br/>Pengunjung<br/>Aktif</h3>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
			<div class="block green">
				<div class="block-left">
					<i class="fa fa-user"></i>
				</div>
				<div class="block-right">
					<h3><?=$visitors['memonline']?> <br/>Pengurus<br/>Aktif</h3>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
			<div class="block yellow">
				<div class="block-left">
					<i class="fa fa-anchor"></i>
				</div>
				<div class="block-right">
                    <h3><?=$totnews?> <br/>Berita</h3>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
			<div class="block red">
				<div class="block-left">
					<i class="fa fa-archive"></i>
				</div>
				<div class="block-right">
					<h3><?=$totagenda?> <br/>Agenda</h3>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12" id="chart">
		<div class="panel">
			<div class="panel-body">
				<h3 class="panel-title"><i class="fa fa-line-chart"></i> Trafik Pengunjung</h3>
				<canvas id="chart1" height="80"></canvas>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-5" id="insight">
		<div class="panel">
			<div class="panel-body">
				<h3 class="panel-title"><i class="fa fa-eye"></i> Insight</h3>
				<table class="table table-striped table-hover">
					<tbody>
						<tr>
							<td class="text-center"><i class="fa fa-users"></i></td>
							<td class="text-left">Total Pengunjung</td>
							<td class="text-right"><label><?=$totalvisitor?></label></td>
						</tr>
						<tr>
							<td class="text-center"><i class="fa fa-newspaper-o"></i></td>
							<td class="text-left">Total Berita</td>
							<td class="text-right"><label><?=$totnews?></label></td>
						</tr>
						<tr>
							<td class="text-center"><i class="fa fa-image"></i></td>
							<td class="text-left">Total Foto</td>
							<td class="text-right"><label><?=$totphotos?></label></td>
						</tr>
						<tr>
							<td class="text-center"><i class="fa fa-film"></i></td>
							<td class="text-left">Total Video</td>
							<td class="text-right"><label><?=$totvideos?></label></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-7" id="popular">
		<div class="panel">
			<div class="panel-body">
				<h3 class="panel-title"><i class="fa fa-newspaper-o"></i> Berita Terpopuler</h3>
				<table class="table table-hover">
					<tbody>
					<?php if (!empty($popular_articles)) {foreach ($popular_articles as $article): ?>
						<tr>
							<td><img src="<?=base_url('assets/img/news_img/' . check_image($article->img_link, './assets/img/news_img/', 'default-2.png'))?>" alt="thumbnail" height="75"></td>
							<td>
								<h4><?=$article->name?></h4>
								<p><?=trim_article(strip_tags($article->body), 120)?></p>
							</td>
						</tr>
					<?php endforeach;} else {echo "<tr>Tidak ada berita</tr>";}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
    var graph = <?=$graph?>;
</script>