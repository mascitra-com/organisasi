<div class="container">
	<div class="row section" id="jumbo">
		<div class="col-xs-12 col-sm-12 col-md-8 green">
			<div class="text-center"><h1>SLIDER</h1></div>
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
		<div class="col-xs-12 col-sm-6 col-md-9 white">
			<div class="row" id="agenda">
				<div class="col-xs-12 table-responsive">
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
			</div>
			<div class="row" id="regulasi">
				<div class="col-xs-12">
					<div class="page-header">
						<h4>Regulasi terbaru</h4>
					</div>
					<p><?=$regulation->body?></p>
					<a href="<?=str_replace(str_replace("\\",'/',FCPATH), base_url(), $regulation->link)?>" class="btn btn-default btn-sm" download><i class="fa fa-file-word-o"></i> Unduh Regulasi</a>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3 blue" id="sosmed">
			<div class="page-header">
				<h4>Sosisal media</h4>
			</div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate possimus ratione voluptatibus deserunt libero est odio dignissimos repellendus, in fugiat!</p>
		</div>
	</div>
	<div class="row section" id="banner-full">
		<div class="col-md-12">
			<img src="<?=$banners[0]?>" alt="banner">
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