<div class="container">
	<div class="row section" id="jumbo">
		<div class="col-xs-12 col-sm-12 col-md-8 black">
			<div class="text-center">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">

						<?php if(!empty($headlines)) {$no=1; foreach($headlines as $headline):?>
							<div class="item <?=($no == 1) ? 'active' : ''?>">
								<a href="<?=site_url('homepage/news_article/'. $headline->slug)?>">
									<img src="<?=base_url('assets/img/news_img/'.check_image($headline->img_link,'./assets/img/news_img/','default-2.png'))?>"" alt="">
								</a>
								<div class="carousel-caption">
									<h3><?=$headline->name?></h3>
									<p><?= trim_article(strip_tags($headline->body), 120)?></p>
								</div>
							</div>
							<?php $no++;?>
						<?php endforeach; } ?>
					</div>

					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 white">
			<div class="panel">
				<div class="panel-body">
					<h3 class="panel-title"><i class="fa fa-newspaper-o"></i> Berita Paling Populer</h3>
					<table class="table table-hover">
						<tbody>
							<?php foreach($popular_articles as $article):?>
								<tr>
									<td><img src="<?=base_url('assets/img/news_img/'.check_image($article->img_link,'./assets/img/news_img/','default-2.png'))?>" alt="thumbnail" height="75"></td>
									<td>
										<a href="<?=site_url('homepage/news_article/'.$article->slug)?>">
											<h4><?=$article->name?></h4>
										</a>
										<p><?= trim_article(strip_tags($article->body), 120)?></p>
									</td>
								</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- PENGUMUMAN -->
	<div class="row section" id="pengumuman">
		<div class="row">
			<div class="col-xs-12 pengumuman">
				<span class="text-warning text-bold">[30-12-2016] Lorem ipsum dolor sit amet</span>
				<span>[25-12-2016] Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur voluptatibus velit necessitatibus cum. Ab tempore, rerum. Necessitatibus et voluptatibus, adipisci.</span>
			</div>
		</div>
	</div>

	<div class="row section" id="new-article">
		<div class="page-header">
			<h3>Berita terbaru</h3>
		</div>
		<?php if(!empty($latest_articles)){ foreach($latest_articles as $article):?>
			<div class="col-sm-6 col-md-3">
				<a href="<?=site_url('homepage/news_article/'.$article->slug)?>">
					<div class="thumbnail">
						<img class="img-fit" src="<?=base_url('assets/img/news_img/'.check_image($article->img_link,'./assets/img/news_img/','default-2.png'))?>" alt="thumbnail">
						<div class="caption">
							<h4><?=$article->name?></h4>
							<span><?= mdate('%d %M %Y', strtotime(str_replace('-', '/', $article->published_at))) ?></span>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach; } else{ echo "Tidak ada berita"; }?>
	</div>
	<!-- BANNER FULL -->
	<div class="row section" id="banner-full">
		<div class="col-md-12">
			<img src="<?=$banners[0]?>" alt="banner">
		</div>
	</div>
	<!-- NEWS -->
	<div class="row section" id="news">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-news" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Artikel Berita</a>
				</div>
				<div class="collapse navbar-collapse" id="nav-news">
					<div class="navbar-form navbar-right">
						<div class="form-group">
							<input type="text" name="name" id="name" class="form-control" placeholder="cari berita">
						</div>
						<button class="btn btn-default" onclick="search_news()"><i class="fa fa-search"></i></button>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li><a class="btn btn-link" href="#!" onclick="all_news()">Semua</a></li>
						<li><a class="btn btn-link" href="#!" onclick="latest_news()">Terbaru</a></li>
						<li><a class="btn btn-link" href="#!" onclick="popular_news()">Terpopuler</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="col-md-12 white">
			<div class="news-list" id="news-list">
				<?php if(!empty($articles)){ foreach($articles as $article):?>
					<div class="col-xs-12 col-sm-4 col-md-3">
						<a href="<?=site_url('homepage/news_article/'.$article->slug)?>">
							<div class="thumbnail">
								<img class="img-fit" src="<?=base_url('assets/img/news_img/'.check_image($article->img_link,'./assets/img/news_img/','default-2.png'))?>" alt="thumbnail" width="100%">
								<div class="caption">
									<h5><?=$article->name ?></h5>
								</div>
							</div>
						</a>
					</div>
				<?php endforeach; } else{ echo "Tidak ada berita"; }?>
			</div>
		</div>
	</div>

	<div class="row section" id="misc1">
		<div class="col-xs-12 col-md-6 table-responsive" id="agenda">
			<div class="page-header">
				<h4>Agenda terbaru</h4>
			</div>
			<table class="table table-striped table-hover">
				<tbody>
					<?php if(!empty($agendas)): foreach($agendas as $agenda):?>
						<tr>
							<td class="text-right">
								<h3><?=date('d', strtotime($agenda->agenda_date))?></h3>
								<h5><?=date('F', strtotime($agenda->agenda_date))?></h5>
								<h5><?=date('Y', strtotime($agenda->agenda_date))?></h5>
							</td>
							<td>
								<h4><?=$agenda->name?></h4>
								<p><?=$agenda->body?></p>
							</td>
						</tr>
					<?php endforeach; endif;?>
				</tbody>
			</table>
		</div>
		<div class="col-xs-12 col-md-6 table-responsive" id="agenda">
			<div class="page-header">
				<h4>Regulasi terbaru</h4>
			</div>
			<table class="table table-striped table-hover">
				<tbody>
					<?php if(!empty($regulations)): foreach($regulations as $regulation):?>
						<tr>
							<td class="text-center">
								<h3><a href="<?=str_replace(str_replace("\\",'/',FCPATH), base_url(), $regulation->link)?>" download><i class="fa fa-download"></i></a></h3>
							</td>
							<td>
								<h4><?= (strlen($regulation->name) > 100) ? substr($regulation->name, 0, 100).'...' :  $regulation->name ?></h4>
								<p><?= (strlen($regulation->body) > 100) ? substr($regulation->body, 0, 100).'...' :  $regulation->body ?></p>
								<span class="label label-default"><?=$regulation->issued_by?></span>
								<span class="label label-default"><?= mdate('%d %M %Y', strtotime(str_replace('-', '/', $regulation->issued_at))) ?></span>
							</td>
						</tr>
					<?php endforeach; endif;?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="row section" id="banner-half">
		<div class="col-xs-12 col-sm-12 col-md-6">
			<img src="<?=$banners[1]?>" alt="banner">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<img src="<?=$banners[2]?>" alt="banner">
		</div>
	</div>

	<div class="row section white" id="gallery-photo">

	</div>
</div>