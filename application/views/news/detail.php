<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-body" style="padding: 25px;">
				<img src="<?=base_url('assets/img/news_img/'.check_image($article->img_link,'./assets/img/news_img/','default-2.png'))?>" alt="judul berita" class="img-fit" class="img-fit" width="100%" height="280px" alt="thumbnail">
				<h1 class="title"><?=$article->name?></h1>
				<span class="label label-default"><i class="fa fa-calendar"></i> <?= mdate('%d %M %Y', strtotime(str_replace('-', '/', $article->published_at))) ?></span>
				<span class="label label-default"><i class="fa fa-user"></i> Oleh <?=$article->user->first_name . ' '. $article->user->last_name;?></span>
				<br><br>
				<p><?=$article->body?></p>
				<br>
				<div class="form-group">
					<a href="<?=site_url('news/edit?slug='.$article->slug)?>" class="btn btn-default"><i class="fa fa-pencil"></i> Edit Berita</a>
					<a href="<?php
					if ($article->type == 'draft') {
						echo site_url('news/draft');
					}elseif ($article->type == 'archive') {
						echo site_url('news/archive');
					}else{
						echo site_url('news');
					}
					?>"><button class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</button></a>
				</div>
			</div>
		</div>
	</div>
</div>