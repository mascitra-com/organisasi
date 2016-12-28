<div class="container">
	<div class="page-header">
		<h1><i class="fa fa-newspaper-o"></i> Berita</h1>
	</div>
	<?php if(!empty($articles)): foreach ($articles as $article): ?>
		<div class="row news-list">
			<div class="col-md-5">
				<img src="<?=base_url('assets/img/news_img/'.check_image($article['img_link'],'./assets/img/news_img/','default-2.png'))?>" alt="judul berita" class="img-fit" width="100%" height="250px">
			</div>
			<div class="col-md-7">
				<h1 class="news-title"><?=$article['name']?></h1>
				<span class="news-date"><i class="fa fa-calendar"></i> <?= mdate('%d %M %Y', strtotime(str_replace('-', '/', $article['published_at']))) ?></span>
				<span class="news-author"><i class="fa fa-user"></i> <?=$article['user']->first_name.' '.$article['user']->last_name?></span>
				<div class="news-content">
					<p><?=(strlen($article['body']) > 254) ? substr($article['body'], 0, 254).'...' :  $article['body']?></p>
					<a href="<?=site_url('homepage/news_article/'.$article['slug'])?>">selengkapnya <i class="fa fa-arrow-right"></i></a>
				</div>
			</div>
		</div>
	<?php endforeach; endif; ?>
	<nav aria-label="...">
		<ul class="pager">
			<li class="previous"><?=$prev_page?></li>
			<li class="next"><?=$next_page?></li>
		</ul>
	</nav>
</div>