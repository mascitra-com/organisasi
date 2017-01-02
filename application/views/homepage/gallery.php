<div class="container-fluid">
	<div class="row">
		<div class="col-sm-6 col-md-3">
			<div class="thumbnail">
			<img class="img-fit" src="" alt="thumbnail">
				<div class="caption">
					<h4><?=$article->name?></h4>
					<span><?= mdate('%d %M %Y', strtotime(str_replace('-', '/', $article->published_at))) ?></span>
				</div>
			</div>
		</div>
	</div>
</div>